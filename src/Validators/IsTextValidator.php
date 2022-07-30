<?php

namespace Src\Validators;

use Exception;

class IsTextValidator extends Validator
{
    /**
     * @var string
     */
    protected string $message = 'The given data should be text.';

    /**
     * Validate data
     *
     * @param mixed $data
     * @return bool
     * @throws Exception
     *
     */
    public function validate(mixed $data): bool
    {
        if (!is_string($data)) {
            $this->throwException();
        }

        return true;
    }
}