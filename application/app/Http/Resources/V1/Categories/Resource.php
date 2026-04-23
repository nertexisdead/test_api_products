<?php

namespace App\Http\Resources\V1\Categories;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'alias' => $this->getAlias(),
            'name' => $this->getName(),
        ];
    }
}
