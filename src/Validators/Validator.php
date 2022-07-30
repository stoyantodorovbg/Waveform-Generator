<?php

namespace Src\Validators;

use Exception;

abstract class Validator
{
    /**
     * @var string
     */
    protected string $message = 'Invalid data given.';

    /**
     * @var int
     */
    protected int $code = 422;

    /**
     * Validate data
     *
     * @param mixed $data
     * @return bool
     * @throws Exception
     *
     */
    abstract public function validate(mixed $data): bool;

    /**
     * Throw an exception
     *
     * @param string $message
     * @param int $code
     * @return void
     * @throws Exception
     */
    protected function throwException(string $message = 'Invalid data.', int $code = 422): void
    {
        throw new Exception($this->message, $this->code);
    }
}