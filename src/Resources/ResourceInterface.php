<?php

namespace Src\Resources;

interface ResourceInterface
{
    /**
     * Read data from a resource as array
     */
    public function readData(): array;

    /**
     * Write string in a resource
     *
     * @param string $input
     * @return void
     */
    public function writeData(string $input): void;
}