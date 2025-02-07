<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Product extends Model
{
    /** @use HasFactory<\Database\Factories\ProductFactory> */
    use HasFactory;

    protected $fillable = ['name', 'description', 'price'];

    public function images(): HasMany
    {
        return $this->hasMany(ProductImage::class);
    }

    public function featuredImage(): HasOne
    {
        return $this->hasOne(ProductImage::class)->where('is_featured', true)->latest();
    }

    public function categories(): BelongsToMany
    {
        return $this->belongsToMany(Category::class, 'product_category');
    }

    public function comments(): HasMany
    {
        return $this->hasMany(Comment::class);
    }

    public function scopeFilterByCategory($query, $filters = [])
    {
        $query->when(isset($filters['category_id']), function ($query) use ($filters) {
            $query->whereHas('categories', function ($query) use ($filters) {
                $query->where('categories.id', $filters['category_id']);
            });
        });
    }

    public function scopeFilterByPrice($query, $filters = [])
    {
        $query->when(isset($filters['min_price']), function ($query) use ($filters) {
            $query->where('price', '>=', $filters['min_price']);
        });

        $query->when(isset($filters['max_price']), function ($query) use ($filters) {
            $query->where('price', '<=', $filters['max_price']);
        });
    }

}
