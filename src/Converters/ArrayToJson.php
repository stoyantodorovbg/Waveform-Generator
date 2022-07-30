<?php

namespace Src\Converters;

class ArrayToJson extends DataConverter
{
    /**
     * Convert data from one format to another
     *
     * @param mixed $input
     * @return mixed
     */
    public function convert(mixed $input): mixed
    {
        return $input;
    }
}