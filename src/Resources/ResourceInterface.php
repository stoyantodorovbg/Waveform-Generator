<?php

namespace Src\Resources;

interface ResourceInterface
{
    /**
     * Convert data in specific format to array
     *
     * @param mixed $input
     * @return array
     */
    public function readData(mixed $input): array;

    /**
     * Convert an array to data in specific format
     *
     * @param array $input
     * @return mixed
     */
    public function writeData(array $input): mixed;
}