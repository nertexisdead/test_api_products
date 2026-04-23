<?php

namespace App\Http\Resources\V1\Products;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class Resource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'category' => $this->getCategoryResource(),
            'name' => $this->getName(),
            'price' => $this->getPrice(),
            'rating' => $this->getRating(),
            'in_stock' => $this->getInStock(),
            'created_at' => $this->getCreatedAtFormatted(),
            'updated_at' => $this->getUpdatedAtFormatted(),
        ];
    }
}
