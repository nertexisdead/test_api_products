<?php

namespace App\Http\Requests\V1\Products;

use App\Http\Requests\ApiFormRequest;

class IndexRequest extends ApiFormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
