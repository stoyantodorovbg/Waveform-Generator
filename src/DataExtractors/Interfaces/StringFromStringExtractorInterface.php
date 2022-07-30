<?php

namespace Src\DataExtractors\Interfaces;

interface StringFromStringExtractorInterface
{
    /**
     * Tries to extract certain string from string
     *
     * @param string $input
     * @return string|bool
     */
    public function extractStringFromString(string $input): string|bool;
}