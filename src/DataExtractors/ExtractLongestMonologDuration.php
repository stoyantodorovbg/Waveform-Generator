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
        // The largest point in the dataset represents the total duration of the call.
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

                // After the start of the monolog start && interrupt last speech
                if ($itemSecond[0] <= $itemFirst[1] && $itemSecond[0] >= $itemFirst[0]) {
                    $resetMonologStart = true;
                    $monologDuration -= $itemFirst[1] - $itemSecond[0];
                    $longestMonologDuration = $this->getLongestMonologDuration($longestMonologDuration, $monologDuration);

                    // Finishes before next pause
                    if ($itemSecond[1] <= $itemFirst[1]) {
                        $monologStart = $itemSecond[1];
                        $monologDuration = $itemFirst[1] - $monologStart;
                        $longestMonologDuration = $this->getLongestMonologDuration($longestMonologDuration, $monologDuration);
                    }
                }

                break;
            }

            $longestMonologDuration = $this->getLongestMonologDuration($longestMonologDuration, $monologDuration);
        }

        return $longestMonologDuration ?: false;
    }

    /**
     * Get the longest monolog duration
     *
     * @param mixed $longestMonologDuration
     * @param mixed $monologDuration
     * @return mixed
     */
    protected function getLongestMonologDuration(mixed $longestMonologDuration, mixed $monologDuration): mixed
    {
        if ($longestMonologDuration < $monologDuration) {
            return $monologDuration;
        }

        return $longestMonologDuration;
    }
}