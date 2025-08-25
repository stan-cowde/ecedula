<?php
require __DIR__ . '/../../vendor/autoload.php';

use App\Services\OCR\ocralgorithm;

$sample = <<<TXT
REPUBLIKA NG PILIPINAS
Republic Ofthé Philippines
PAMBANSANG PAGKAKAKILAN!AN
Philippine Identification
PCN
Tiråhan/Äddresss
833 SISA ST., BRGY 526, ZON
CITY, METRO MANILA
Apelyido/LdSt Näme
DELA CRUZ
fMga Pang@lan/Given Names
JUAN
GitnCandApelyido/Middle Name
MARTINEZ
Petsaong Kapanganakån/DateofBirth
JANUARY 01, 1990
PHL
SAMPALOK, MANILA
TXT;

$ocr = new ocralgorithm();
$ref = new ReflectionClass($ocr);
$method = $ref->getMethod('parsePhilID');
$method->setAccessible(true);
$result = $method->invoke($ocr, $sample);

echo json_encode($result, JSON_PRETTY_PRINT) . PHP_EOL;
