<?php

namespace Src\DataExtractors;

use Src\DataExtractors\Interfaces\FloatFromArrayInterface;

class ExtractTalkDuration implements FloatFromArrayInterface
{
    /**
     * Extracts talk percentage
     *
     * @param array $input
     * @return float|bool
     */
    public function extractFloatFromArray(array $input): float|bool
    {
        $talkDuration = 0;

        foreach ($input as $item) {
            if (count($item) === 2) {
                $talkDuration += $item[1] - $item[0];
            }
        }

        return $talkDuration ?: false;
    }
}