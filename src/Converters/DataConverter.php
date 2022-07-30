<?php

namespace Src\Converters;

abstract class DataConverter
{
    /**
     * Convert data from one format to another
     *
     * @param mixed $input
     * @return mixed
     */
    abstract public function convert(mixed $input): mixed;
}