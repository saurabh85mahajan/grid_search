<?php

namespace App\Services;

class Extractor
{
    public static function getExtractorClass($insuranceType)
    {
        switch ($insuranceType) {
            case 'United':
                return new UnitedInsuranceExtractor();
            case 'Digit':
                return new DigitExtractor();
            case 'Icici':
                return new IciciExtractor();
            case 'Tata':
                return new TataExtractor();
            default:
                throw new \Exception('This Insurance Company is not yet supported');
        }
    }
}
