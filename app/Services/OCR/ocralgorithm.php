<?php

namespace App\Services\OCR;

use Illuminate\Support\Facades\Http;

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

                            return [
                                'id_number'   => $this->extractPattern($parsedText, '/\b(\d{4}-\d{4}-\d{4}-\d{4})\b/'),
                                'last_name'   => $this->extractPattern($parsedText, '/Apelyido\/Last Name\s*([\w\s]+)/'),
                                'given_name'  => $this->extractPattern($parsedText, '/Mga Pangalan\/Given Names\s*([\w\s]+)/'),
                                'dob'         => $this->extractPattern($parsedText, '/Petsa ng Kapanganakan\/Date of Birth\s*([A-Za-z\s\'0-9,]+)/'),
                                'address'     => $this->extractPattern($parsedText, '/Tirahan\/Address\s*([\w\s,]+)/'),
                                'middle_name' => $this->extractPattern($parsedText, '/Gitnang Apelyido\/Middle Name\s*([\w\s]+)/'),
                            ];
                        } else {

                            throw new \Exception('OCR processing failed: ' . implode(', ', $result['ErrorMessage']));
                        }
                    } else {
                        throw new \Exception('HTTP request failed with status: ' . $response->status());
                    }


        } catch(\Illuminate\Http\Client\ConnectionException $e){

            if (str_contains($e->getMessage(), 'cURL error 28')) {

                // Log the specific cURL error 28 message
                \Log::error('OCR.space API timeout error: ' . $e->getMessage());

               flash()->warning('OCR.space API timeout error, Please Manually input the data.');

            } else {

            }

        }


    }

    private function extractPattern($text, $pattern)
    {
        preg_match($pattern, $text, $matches);

        return $matches[1] ?? '';
    }

}
