<?php

namespace Src\DataExtractors;

use Src\DataExtractors\Interfaces\StringFromStringExtractorInterface;

class ExtractSilenceDetectRow implements StringFromStringExtractorInterface
{
    /**
     * Extracts silence detect row
     *
     * @param string $input
     * @return string|bool
     */
    public function extractStringFromString(string $input): string|bool
    {
        if (str_starts_with($input, '[silencedetect @ ') && is_numeric($input[strlen($input) - 1])) {
            return $input;
        }

        return false;
    }
}