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
        // The largest point in the dataset represents the total duration of the call.
        unset($input[count($input) - 1]);
        $talkDuration = 0;

        foreach ($input as $item) {
            $talkDuration += $item[1] - $item[0];
        }

        return $talkDuration ?: false;
    }
}