<?php

namespace App\Enums;

enum Errors: string
{
    case NOT_FOUND = 'NOT_FOUND';

    case INVALID = 'INVALID';

    case INTERNAL_SERVER_ERROR = 'INTERNAL_SERVER_ERROR';

    public function getMessage()
    {
        return __('Errors: ' . $this->value);
    }
}
