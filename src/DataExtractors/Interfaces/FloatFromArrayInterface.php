<?php

namespace Src\DataExtractors\Interfaces;

interface FloatFromArrayInterface
{
    /**
     * Tries to extract float from array
     *
     * @param array $input
     * @return float|bool
     */
    public function extractFloatFromArray(array $input): float|bool;
}