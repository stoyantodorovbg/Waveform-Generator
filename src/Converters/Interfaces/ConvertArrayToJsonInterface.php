<?php

namespace Src\Converters\Interfaces;

use JsonException;

interface ConvertArrayToJsonInterface
{
    /**
     * Convert array to json
     *
     * @param array $input
     * @param array $settings = []
     * @return string|false
     * @throws JsonException
     */
    public function convert(array $input, array $settings = []): string|false;
}