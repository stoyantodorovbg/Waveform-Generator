<?php

namespace Src\Services\Interfaces;

interface SilenceDetectServiceInterface
{
    /**
     * Detect intervals from files
     *
     * @param array $settings
     * @return array
     */
    public function detectFromFiles(array $settings): array;
}