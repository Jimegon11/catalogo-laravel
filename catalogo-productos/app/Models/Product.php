<?php

namespace App\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    /** @use HasFactory<ProductFactory> */
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'price',
        'original_price',
        'category',
        'image_url',
        'stock',
        'is_featured',
        'rating',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'stock' => 'integer',
        'is_featured' => 'boolean',
        'rating' => 'float',
    ];

    /**
     * Calculates the discount percentage compared to the original price.
     */
    public function getDiscountPercentageAttribute(): ?int
    {
        if (! $this->original_price || $this->original_price <= $this->price) {
            return null;
        }

        return (int) round((($this->original_price - $this->price) / $this->original_price) * 100);
    }

    /**
     * Determines if the product is currently in stock.
     */
    public function getIsInStockAttribute(): bool
    {
        return $this->stock > 0;
    }
}
