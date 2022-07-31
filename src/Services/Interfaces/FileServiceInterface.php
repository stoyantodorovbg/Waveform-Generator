<?php

namespace Src\Services\Interfaces;

interface FileServiceInterface
{
    /**
     * Read data from file
     *
     * @param array $settings
     * @return array
     */
    public function read(array $settings): array;

    /**
     * Write data in file
     *
     * @param string $data
     * @param array $settings
     * @return void
     */
    public function write(string $data, array $settings): void;
}