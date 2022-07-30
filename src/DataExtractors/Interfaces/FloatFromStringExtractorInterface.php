<?php

namespace Src\DataExtractors\Interfaces;

interface FloatFromStringExtractorInterface
{
    /**
     * Tries to extract float from string
     *
     * @param string $input
     * @return float|bool
     */
    public function extractFloatFromString(string $input): float|bool;
}