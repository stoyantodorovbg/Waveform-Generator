<?php

namespace Src\Converters;

use JsonException;
use Src\Converters\Interfaces\ConvertArrayToJsonInterface;

class ArrayToJson implements ConvertArrayToJsonInterface
{
    /**
     * Convert array to json
     *
     * @param array $input
     * @param array $settings = []
     * @return string|false
     * @throws JsonException
     */
    public function convert(array $input, array $settings = []): string|false
    {
        return json_encode($input, JSON_THROW_ON_ERROR);
    }
}