<?php

namespace Src\DataExtractors;

use Src\DataExtractors\Interfaces\FloatFromStringExtractorInterface;

class ExtractSilenceEnd implements FloatFromStringExtractorInterface
{
    /**
     * Extracts silence end
     *
     * @param string $input
     * @return float|bool
     */
    public function extractFloatFromString(string $input): float|bool
    {
        if (str_contains($input, 'silence_end: ')) {
            $data = explode('|', $input)[0];

            return (float) trim(explode('silence_end: ', $data)[1], ' ');
        }

        return false;
    }
}