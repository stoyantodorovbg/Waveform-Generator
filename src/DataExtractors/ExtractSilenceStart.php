<?php

namespace Src\DataExtractors;

use Src\DataExtractors\Interfaces\FloatFromStringExtractorInterface;

class ExtractSilenceStart implements FloatFromStringExtractorInterface
{
    /**
     * Extracts silence start
     *
     * @param string $input
     * @return float|bool
     */
    public function extractFloatFromString(string $input): float|bool
    {
        if (str_contains($input, 'silence_start: ')) {
            return (float) explode('silence_start: ', $input)[1];
        }

        return false;
    }
}