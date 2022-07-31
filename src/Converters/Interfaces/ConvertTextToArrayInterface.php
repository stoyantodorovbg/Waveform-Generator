<?php

namespace Src\Converters\Interfaces;

interface ConvertTextToArrayInterface
{
    /**
     * Convert text to array
     *
     * @param string $input
     * @param array $settings = []
     * @return array
     */
    public function convert(string $input, array $settings = []): array;
}