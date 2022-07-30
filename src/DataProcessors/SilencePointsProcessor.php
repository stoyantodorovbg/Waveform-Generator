<?php

namespace Src\DataProcessors;

use Src\DataExtractors\ExtractSilenceDetectRow;
use Src\DataExtractors\ExtractSilenceEnd;
use Src\DataExtractors\ExtractSilenceStart;
use Src\DataExtractors\Interfaces\FloatFromStringExtractorInterface;
use Src\DataExtractors\Interfaces\StringFromStringExtractorInterface;

class SilencePointsProcessor implements ProcessArrayToArrayInterface
{
    /**
     * @var StringFromStringExtractorInterface
     */
    protected StringFromStringExtractorInterface $extractSilenceDetectRow;

    /**
     * @var FloatFromStringExtractorInterface
     */
    protected FloatFromStringExtractorInterface $extractSilenceStart;

    /**
     * @var FloatFromStringExtractorInterface
     */
    protected FloatFromStringExtractorInterface $extractSilenceEnd;

    public function __construct()
    {
        $this->extractSilenceDetectRow = new ExtractSilenceDetectRow();
        $this->extractSilenceStart = new ExtractSilenceStart();
        $this->extractSilenceEnd = new ExtractSilenceEnd();
    }

    /**
     * Processes an array and returns array
     *
     * @param array $input
     * @return array
     */
    public function processArrayToArray(array $input): array
    {
        $output = [[0]];

        foreach($input as $row) {
            if (($silenceDetectRow = $this->extractSilenceDetectRow->extractStringFromString($row))) {
                $output = $this->addSilenceEnd($silenceDetectRow, $output);
                $output = $this->addSilenceStart($silenceDetectRow, $output);
            }
        }

        return $output;
    }

    /**
     * Add silence end
     *
     * @param bool|string $silenceDetectRow
     * @param array $output
     * @return array
     */
    protected function addSilenceEnd(bool|string $silenceDetectRow, array $output): array
    {
        if ($extractSilenceEnd = $this->extractSilenceEnd->extractFloatFromString($silenceDetectRow)) {
            $output[] = [$extractSilenceEnd];
        }

        return $output;
    }

    /**
     * Add silence start
     *
     * @param bool|string $silenceDetectRow
     * @param array $output
     * @return array
     */
    protected function addSilenceStart(bool|string $silenceDetectRow, array $output): array
    {
        if ($silenceStart = $this->extractSilenceStart->extractFloatFromString($silenceDetectRow)) {
            $output[count($output) - 1][] = $silenceStart;
        }

        return $output;
    }
}