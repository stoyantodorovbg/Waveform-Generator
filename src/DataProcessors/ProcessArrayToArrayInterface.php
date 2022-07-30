<?php

namespace Src\DataProcessors;

interface ProcessArrayToArrayInterface
{
    /**
     * Processes an array and returns array
     *
     * @param array $input
     * @return array
     */
    public function processArrayToArray(array $input): array;
}