<?php

namespace Src\Resources;

interface ResourceInterface
{
    /**
     * Convert data in specific format to array
     */
    public function readData(): array;

    /**
     * Convert an array to data in specific format
     *
     * @param array $input
     * @return void
     */
    public function writeData(array $input): void;
}