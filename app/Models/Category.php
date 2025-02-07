<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends Model
{
    /** @use HasFactory<\Database\Factories\CategoryFactory> */
    use HasFactory;

    protected $fillable = ['name', 'parent_id', 'depth'];

    public function children(): HasMany
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function parent(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_category');
    }

    public static function createCategory($category)
    {
        if (isset($category['parent_id'])) {
            $parent = self::find($category['parent_id']);

            if (!$parent) {
                throw new \Exception('Parent category not found.');
            }

            if ($parent->depth >= 3) {
                throw new \Exception('Maximum depth of 3 levels reached.');
            }

            $category['depth'] = $parent->depth + 1;
        } else {
            $category['depth'] = 1;
        }

        return self::create($category);
    }
}
