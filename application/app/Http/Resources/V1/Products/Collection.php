<?php

namespace App\Http\Resources\V1\Products;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class Collection extends ResourceCollection
{
    public function __construct($resource, private $filters, private $orders, private $pagination)
    {
        parent::__construct($resource);
    }

    public function getPosts(): array
    {
        return $this->collection
            ->map(function ($post) {
                return new Resource($post);
            })
            ->toArray()
        ;
    }

    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            ...[
                'products' => $this->getPosts(),
            ],
            ...collect([
                'filters' => (($this->filters)
                    ? (object)$this->filters
                    : null
                ),
                'orders' => (($this->orders)
                    ? (object)$this->orders
                    : null
                ),
                'pagination' => (($this->pagination)
                    ? (object)$this->pagination
                    : null
                ),
            ])
                ->filter()
                ->all()
        ];
    }
}
