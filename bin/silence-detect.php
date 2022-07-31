<?php

use Src\Calculations\PercentageCalculator;
use Src\Connections\FileConnection;
use Src\Connectors\FileConnector;
use Src\Converters\ArrayToJson;
use Src\DataExtractors\ExtractCallDuration;
use Src\DataExtractors\ExtractLongestMonologDuration;
use Src\DataExtractors\ExtractTalkDuration;
use Src\DataProcessors\SilencePointsProcessor;

require __DIR__.'/../vendor/autoload.php';

$connector = new FileConnector(new FileConnection());
$baseDir = dirname(__DIR__, 1);
$customSettings = [
    'customer' => ['inputPath' => $baseDir . '/input/customer-channel.txt'],
    'user'     => ['inputPath' => $baseDir . '/input/user-channel.txt'],
];

$points = [];
$silencePointsProcessor = new SilencePointsProcessor();
foreach ($customSettings as $key => $settings) {
    $fileResource = $connector->connect('silenceDetect', $settings);
    $points[$key] = $silencePointsProcessor->processArrayToArray($fileResource->readData());
}


$longestMonologExtractor = new ExtractLongestMonologDuration();

$talkDurationExtractor = new ExtractTalkDuration();
$userTalkDuration = $talkDurationExtractor->extractFloatFromArray($points['user']);
$customerTalkDuration = $talkDurationExtractor->extractFloatFromArray($points['customer']);
$callDurationExtractor = new ExtractCallDuration();
$callDuration = $callDurationExtractor->extractFloatFromArray([$points['user'], $points['customer']]);
$percentageCalculator = new PercentageCalculator();

$result = [
    'longest_user_monologue'     => round($longestMonologExtractor->extractFloatFromArray([$points['user'], $points['customer']]), 2),
    'longest_customer_monologue' => round($longestMonologExtractor->extractFloatFromArray([$points['customer'], $points['user']]), 2),
    'user_talk_percentage'       => round($percentageCalculator->percentOf($userTalkDuration, $callDuration), 2),
    'user'                       => $points['user'],
    'customer'                   => $points['customer'],

];
$converter = new ArrayToJson();
$json = $converter->convert($result);

$fileResource = $connector->connect('silenceDetect', ['outputPath' => $baseDir . '/output/silence-detect.json']);
$fileResource->writeData($json);

print_r($json);

