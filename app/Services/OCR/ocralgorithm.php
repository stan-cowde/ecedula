<?php

namespace App\Services\OCR;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Str;

class ocralgorithm
{
    public function ocrSpaceFile($filePath, $apiKey = 'K88208119988957', $language = 'eng')
    {

        try {

                $fileData = fopen($filePath, 'r');


                $response = Http::attach('file', $fileData, basename($filePath))
                    ->post('https://api.ocr.space/parse/image', [
                        'apikey' => $apiKey,
                        'language' => $language,
                    ]);

                fclose($fileData);

                    if ($response->successful()) {

                        $result = $response->json();

                        if (!$result['IsErroredOnProcessing']) {

                            $parsedText = $result['ParsedResults'][0]['ParsedText'];

                            $parsedData = $this->parsePhilID($parsedText);

                           # dd($parsedData);

                            return $parsedData;
                        } else {

                            throw new \Exception('OCR processing failed: ' . implode(', ', $result['ErrorMessage']));
                        }
                    } else {
                        throw new \Exception('HTTP request failed with status: ' . $response->status());
                    }


        } catch(\Illuminate\Http\Client\ConnectionException $e){

            if (str_contains($e->getMessage(), 'cURL error 28')) {

                // Log the specific cURL error 28 message
                \Log::error('OCR Failed: ' . $e->getMessage());

               flash()->warning('OCR Failed, Please Manually input the data.');

            } else {

            }

        }


    }

    private function extractPattern($text, $pattern)
    {
        preg_match($pattern, $text, $matches);

        return $matches[1] ?? '';
    }

    private function parsePhilID(string $text): array
    {
        $lines = preg_split("/(\r\n|\n|\r)/", $text) ?: [];
        $rawLines = array_map('trim', $lines);
        $normLines = array_map(function ($l) {
            return $this->normalizeForMatch($l);
        }, $rawLines);

        $idNumber   = $this->extractIdNumber($text, $rawLines, $normLines);
        $lastName   = $this->extractFieldValue($rawLines, $normLines, ['apelyido', 'last name', 'lastname', 'surname']);
        $givenName  = $this->extractFieldValue($rawLines, $normLines, ['mga pangalan', 'mga pangalan', 'given names', 'given name']);
        $middleName = $this->extractFieldValue($rawLines, $normLines, ['gitnang apelyido', 'gitnang', 'middle name', 'middlename', 'middle']);
        $dob        = $this->extractDateValue($rawLines, $normLines, ['petsa ng kapanganakan', 'petsa', 'date of birth', 'birthdate', 'dateofbirth']);
        $address    = $this->extractAddressValue($rawLines, $normLines, ['tirahan', 'address', 'tirahan address']);

        return [
            'id_number'   => $idNumber,
            'last_name'   => $lastName,
            'given_name'  => $givenName,
            'dob'         => $dob,
            'address'     => $address,
            'middle_name' => $middleName,
        ];
    }

    private function normalizeForMatch(string $s): string
    {
        // Convert to ASCII (remove diacritics), lowercase, replace common OCR confusions, and strip non-alphanumerics
        $s = Str::ascii($s);
        $s = strtolower($s);
        // Handle a couple of common OCR confusions
        $s = str_replace(['@', '|'], ['a', 'l'], $s);
        $s = preg_replace('/[^a-z0-9]+/i', ' ', $s);
        $s = trim(preg_replace('/\s+/', ' ', $s));
        return $s;
    }

    private function lineMatches(string $normalizedLine, array $variants): bool
    {
        foreach ($variants as $variant) {
            $vn = $this->normalizeForMatch($variant);
            $words = array_values(array_filter(explode(' ', $vn)));
            $ok = true;
            foreach ($words as $w) {
                if ($w !== '' && strpos($normalizedLine, $w) === false) {
                    $ok = false;
                    break;
                }
            }
            if ($ok) return true;
        }
        return false;
    }

    private function isLikelyLabelLine(string $normalizedLine): bool
    {
        $allVariantGroups = [
            ['apelyido', 'last name', 'lastname', 'surname'],
            ['mga pangalan', 'mga pangalan', 'given names', 'given name'],
            ['gitnang apelyido', 'gitnang', 'middle name', 'middlename', 'middle'],
            ['petsa ng kapanganakan', 'petsa', 'date of birth', 'birthdate', 'dateofbirth'],
            ['tirahan', 'address', 'tirahan address'],
            ['pcn', 'philsys card number', 'phil sys card number', 'card number']
        ];

        foreach ($allVariantGroups as $variants) {
            if ($this->lineMatches($normalizedLine, $variants)) {
                return true;
            }
        }

        // Also consider obvious headers that should not be captured as values
        if (strpos($normalizedLine, 'repub') !== false || strpos($normalizedLine, 'philippine') !== false || strpos($normalizedLine, 'pambansang') !== false) {
            return true;
        }

        return false;
    }

    private function extractInlineValue(string $rawLine): string
    {
        // Try to capture any text after common separators
        if (preg_match('/[:\-–—]\s*(.+)$/u', $rawLine, $m)) {
            return trim($m[1]);
        }
        return '';
    }

    private function extractFieldValue(array $rawLines, array $normLines, array $labelVariants, int $lookAhead = 2): string
    {
        $count = count($rawLines);
        for ($i = 0; $i < $count; $i++) {
            if ($this->lineMatches($normLines[$i], $labelVariants)) {
                // First try inline value on the same line
                $inline = $this->extractInlineValue($rawLines[$i]);
                if ($inline !== '') {
                    return $this->sanitizeName($inline);
                }

                // Otherwise, look ahead for the next non-empty, non-label line
                for ($j = $i + 1; $j < min($count, $i + 1 + $lookAhead); $j++) {
                    $candidateNorm = $normLines[$j];
                    if ($candidateNorm === '') continue;
                    if ($this->isLikelyLabelLine($candidateNorm)) continue;
                    return $this->sanitizeName($rawLines[$j]);
                }
            }
        }
        return '';
    }

    private function extractDateValue(array $rawLines, array $normLines, array $labelVariants): string
    {
        $count = count($rawLines);
        for ($i = 0; $i < $count; $i++) {
            if ($this->lineMatches($normLines[$i], $labelVariants)) {
                // Try inline first
                $inline = $this->extractInlineValue($rawLines[$i]);
                if ($inline !== '') {
                    $detected = $this->detectDateString($inline);
                    if ($detected !== '') return $detected;
                }
                // Check next couple of lines for a date pattern
                for ($j = $i + 1; $j < min($count, $i + 3); $j++) {
                    $candidate = $this->detectDateString($rawLines[$j]);
                    if ($candidate !== '') return $candidate;
                    // Stop if we hit another label
                    if ($this->isLikelyLabelLine($normLines[$j])) break;
                }
            }
        }
        return '';
    }

    private function detectDateString(string $s): string
    {
        $cand = trim($s);
        if ($cand === '') return '';

        // Month name formats, e.g., January 01, 1990
        if (preg_match('/\b(jan|feb|mar|apr|may|jun|jul|aug|sep|sept|oct|nov|dec)[a-z]*\s+\d{1,2},\s*\d{4}\b/i', $cand, $m)) {
            return strtoupper(trim($m[0]));
        }
        // Numeric formats: 01/01/1990 or 1990-01-01
        if (preg_match('/\b\d{1,2}[\/\-]\d{1,2}[\/\-]\d{2,4}\b/', $cand, $m)) {
            return strtoupper(trim($m[0]));
        }
        if (preg_match('/\b\d{4}[\/\-]\d{1,2}[\/\-]\d{1,2}\b/', $cand, $m)) {
            return strtoupper(trim($m[0]));
        }
        return '';
    }

    private function extractAddressValue(array $rawLines, array $normLines, array $labelVariants, int $maxLines = 2): string
    {
        $count = count($rawLines);
        for ($i = 0; $i < $count; $i++) {
            if ($this->lineMatches($normLines[$i], $labelVariants)) {
                $parts = [];
                // First try inline
                $inline = $this->extractInlineValue($rawLines[$i]);
                if ($inline !== '') {
                    $parts[] = $inline;
                }
                // Then collect following lines up to $maxLines that aren't labels
                $collected = 0;
                for ($j = $i + 1; $j < $count && $collected < $maxLines; $j++) {
                    $candidateNorm = $normLines[$j];
                    $candidateRaw  = trim($rawLines[$j]);
                    if ($candidateRaw === '') continue;
                    if ($this->isLikelyLabelLine($candidateNorm)) break;
                    $parts[] = $candidateRaw;
                    $collected++;
                }
                $address = $this->sanitizeAddress(implode(', ', $parts));
                return $address;
            }
        }
        return '';
    }

    private function extractIdNumber(string $fullText, array $rawLines, array $normLines): string
    {
        // 1) Try to find any 16 digits grouped in 4s with any separators
        if (preg_match('/\b(?:\d{4}\D*){3}\d{4}\b/', $fullText, $m)) {
            $digits = preg_replace('/\D+/', '', $m[0]);
            if (strlen($digits) >= 16) {
                $digits = substr($digits, 0, 16);
                return implode('-', str_split($digits, 4));
            }
        }
        // 2) Try continuous 16 digits
        if (preg_match('/\b\d{16}\b/', $fullText, $m)) {
            $digits = $m[0];
            return implode('-', str_split($digits, 4));
        }
        // 3) Search lines near "pcn" mentions
        $count = count($rawLines);
        for ($i = 0; $i < $count; $i++) {
            if ($this->lineMatches($normLines[$i], ['pcn', 'philsys card number', 'phil sys card number', 'card number'])) {
                // Check same line
                if (preg_match('/(\d[\d\D]{0,40})$/', $rawLines[$i], $m)) {
                    $digits = preg_replace('/\D+/', '', $m[1]);
                    if (strlen($digits) >= 16) {
                        $digits = substr($digits, 0, 16);
                        return implode('-', str_split($digits, 4));
                    }
                }
                // Check the next two lines
                for ($j = $i + 1; $j < min($count, $i + 3); $j++) {
                    $digits = preg_replace('/\D+/', '', $rawLines[$j]);
                    if (strlen($digits) >= 16) {
                        $digits = substr($digits, 0, 16);
                        return implode('-', str_split($digits, 4));
                    }
                }
            }
        }
        return '';
    }

    private function sanitizeName(string $s): string
    {
        $s = Str::ascii($s);
        $s = strtoupper($s);
        // Keep letters, spaces, hyphens and apostrophes
        $s = preg_replace("/[^A-Z\s\-\']+/", '', $s);
        $s = trim(preg_replace('/\s+/', ' ', $s));
        return $s;
    }

    private function sanitizeAddress(string $s): string
    {
        $s = Str::ascii($s);
        $s = strtoupper($s);
        // Keep letters, numbers, spaces and common punctuation (.,-#/)
        $s = preg_replace('/[^A-Z0-9\s\.,\-#\/]/', '', $s);
        $s = preg_replace('/\s*,\s*/', ', ', $s);
        $s = trim(preg_replace('/\s+/', ' ', $s));
        return $s;
    }

}
