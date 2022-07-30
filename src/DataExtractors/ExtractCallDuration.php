<?php

namespace Src\DataExtractors;

use Src\DataExtractors\Interfaces\FloatFromArrayInterface;

class ExtractCallDuration implements FloatFromArrayInterface
{
    /**
     * Extracts call duration
     *
     * @param array $input
     * @return float|bool
     */
    public function extractFloatFromArray(array $input): float|bool
    {
        $duration = 0;

        foreach ($input as $item) {
            $largestSilenceEnd = $item[count($item) - 1][0];
            if ($largestSilenceEnd > $duration) {
                $duration = $largestSilenceEnd;
            }
        }

        return $duration ?: false;
    }
}