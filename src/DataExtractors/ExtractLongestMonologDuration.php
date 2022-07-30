<?php

namespace Src\DataExtractors;

use Src\DataExtractors\Interfaces\FloatFromArrayInterface;

class ExtractLongestMonologDuration implements FloatFromArrayInterface
{
    /**
     * Extracts longest monolog duration
     *
     * @param array $input
     * @return float|bool
     */
    public function extractFloatFromArray(array $input): float|bool
    {
        $longestMonologDuration = 0;

        foreach ($input as $item) {
            if (count($item) < 2) {
                continue;
            }

            $monologDuration = $item[1] - $item[0];
            if ($longestMonologDuration < $monologDuration) {
                $longestMonologDuration = $monologDuration;
            }
        }

        return $longestMonologDuration ?: false;
    }
}