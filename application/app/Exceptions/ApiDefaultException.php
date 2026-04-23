<?php

namespace App\Exceptions;

use Exception;

class ApiDefaultException extends Exception
{
    public function __construct(public mixed $errors)
    {
        $this->errors = collect($errors);
    }
}
