<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Comment extends Model
{
    protected $fillable = [
        'product_id',
        'author',
        'email',
        'content',
        'is_approved',
        'rating'
    ];

    public function product():BelongsTo
    {
        return $this->belongsTo(Product::class);
    }

}
