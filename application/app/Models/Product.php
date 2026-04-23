<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Http\Resources\V1\Categories\Resource as CategoryResource;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'in_stock',
        'rating',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'in_stock' => 'boolean',
        'rating' => 'float',
    ];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }

    public function getCategoryResource(): ?CategoryResource
    {
        return $this->category
            ? new CategoryResource($this->category)
            : null
        ;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getPrice(): float
    {
        return (float) $this->price;
    }

    public function getRating(): float
    {
        return (float) $this->rating;
    }

    public function getInStock(): bool
    {
        return (bool) $this->in_stock;
    }

    public function getCreatedAtFormatted(): ?string
    {
        return (($this->created_at)
            ? $this->created_at->format('Y-m-d H:i')
            : null
        );
    }

    public function getUpdatedAtFormatted(): ?string
    {
        return (($this->updated_at)
            ? $this->updated_at->format('Y-m-d H:i')
            : null
        );
    }
}
