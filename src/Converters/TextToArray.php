<?php

namespace Src\Converters;

use Src\Converters\Interfaces\ConvertTextToArrayInterface;

class TextToArray implements ConvertTextToArrayInterface
{
    /**
     * Convert text to array
     *
     * @param string $input
     * @param array $settings = []
     * @return array
     */
    public function convert(string $input, array $settings = []): array
    {
        $separator = $settings['separator'] ?? "\n";

        return explode($separator, $input);
    }
}