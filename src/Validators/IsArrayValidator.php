<?php

namespace Src\Validators;

use Exception;

class IsArrayValidator extends Validator
{
    /**
     * @var string
     */
    protected string $message = 'The given data should be array.';

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
        if (!is_array($data)) {
            $this->throwException();
        }

        return true;
    }
}