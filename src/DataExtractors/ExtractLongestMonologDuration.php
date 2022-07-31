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
        unset($input[0][count($input[0]) - 1], $input[1][count($input[1]) - 1]);

        $longestMonologDuration = 0;
        $monologStart = 0;
        $resetMonologStart = false;

        foreach ($input[0] as $itemFirst) {
            if ($resetMonologStart) {
                $monologStart = $itemFirst[0];
            }

            $monologDuration = $itemFirst[1] - $monologStart;

            foreach ($input[1] as $itemSecond) {
                if ($itemSecond[0] < $monologStart) {
                    continue;
                }

                //greater than monolog start && less than next pause && interrupt other speaker
                if ($itemSecond[0] <= $itemFirst[1] && $itemSecond[0] >= $itemFirst[0]) {
                    $monologDuration -= $itemFirst[1] - $itemSecond[0];
                    if ($longestMonologDuration < $monologDuration) {
                        $longestMonologDuration = $monologDuration;
                    }
                    $monologDuration = 0;

                    if ($itemSecond[1] < $itemFirst[1]) {
                        $monologStart = $itemSecond[1];
                        $monologDuration = $itemFirst[1] - $monologStart;
                        if ($longestMonologDuration < $monologDuration) {
                            $longestMonologDuration = $monologDuration;
                        }

                        $resetMonologStart = true;

                        continue;
                    }
                    $resetMonologStart = true;

                    break;
                }

                //greater than monolog start && less than last speech start
                if ($itemSecond[0] <= $itemFirst[1]) {
                    $resetMonologStart = true;
                    break;
                }

                break;
            }

            if ($longestMonologDuration < $monologDuration) {
                $longestMonologDuration = $monologDuration;
            }
        }

        return $longestMonologDuration ?: false;
    }
}