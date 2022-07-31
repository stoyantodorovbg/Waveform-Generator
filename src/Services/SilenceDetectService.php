<?php

namespace Src\Services;

use Src\Calculations\PercentageCalculator;
use Src\DataExtractors\ExtractCallDuration;
use Src\DataExtractors\ExtractLongestMonologDuration;
use Src\DataExtractors\ExtractTalkDuration;
use Src\DataProcessors\SilencePointsProcessor;

class SilenceDetectService
{
    /**
     * Detect intervals from files
     *
     * @param array $settings
     * @return array
     */
    public function detectFromFiles(array $settings): array
    {
        $fileService = new FileService();

        $points = [];
        $silencePointsProcessor = new SilencePointsProcessor();
        foreach ($settings as $key => $value) {
            $settings = [
                'connectionName' => 'silenceDetect',
                'fileSettings'   => $value,
            ];
            $points[$key] = $silencePointsProcessor->processArrayToArray($fileService->read($settings));
        }

        $longestMonologExtractor = new ExtractLongestMonologDuration();
        $talkDurationExtractor = new ExtractTalkDuration();
        $userTalkDuration = $talkDurationExtractor->extractFloatFromArray($points['user']);
        $callDurationExtractor = new ExtractCallDuration();
        $callDuration = $callDurationExtractor->extractFloatFromArray([$points['user'], $points['customer']]);
        $percentageCalculator = new PercentageCalculator();

        return [
            'longest_user_monologue'     => round($longestMonologExtractor->extractFloatFromArray([$points['user'], $points['customer']]), 2),
            'longest_customer_monologue' => round($longestMonologExtractor->extractFloatFromArray([$points['customer'], $points['user']]), 2),
            'user_talk_percentage'       => round($percentageCalculator->percentOf($userTalkDuration, $callDuration), 2),
            'user'                       => $points['user'],
            'customer'                   => $points['customer'],
        ];
    }
}