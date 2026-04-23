<?php

namespace App\Http\Requests;

use App\Enums\Errors;
use App\Exceptions\ApiDefaultException;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;

class ApiFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    protected function nullify($value)
    {
        return (($value === 'null') ? null : $value);
    }

    protected function failedValidation(Validator $validator)
    {
        throw new ApiDefaultException(
            Errors::INVALID
        );
    }

    protected function failedAuthorization()
    {
        throw new AuthenticationException();
    }
}
