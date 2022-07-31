<?php

use Src\Converters\ArrayToJson;
use Src\Services\FileService;
use Src\Services\SilenceDetectService;

require __DIR__.'/../vendor/autoload.php';

$baseDir = dirname(__DIR__, 1);
$settings = [
    'customer' => ['inputPath' => $baseDir . '/input/customer-channel.txt'],
    'user'     => ['inputPath' => $baseDir . '/input/user-channel.txt'],
];

$service = new SilenceDetectService();
$result = $service->detectFromFiles($settings);

$converter = new ArrayToJson();
$json = $converter->convert($result);

$settings = [
    'connectionName' => 'silenceDetect',
    'fileSettings'   => ['outputPath' => $baseDir . '/output/silence-detect.json'],
];

$service = new FileService();
$service->write($json, $settings);

print_r($json);

