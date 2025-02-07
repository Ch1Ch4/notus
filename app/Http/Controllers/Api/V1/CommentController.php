<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\StoreCommentRequest;
use App\Http\Resources\CommentResource;
use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(StoreCommentRequest $request, Product $product)
    {
        $validated = $request->validated();

        $comment = new Comment([
            'author' => $validated['author'],
            'email' => $validated['email'],
            'content' => $validated['content'],
            'is_approved' => $validated['is_approved'] ?? false,
            'rating' => $validated['rating'] ?? null,
        ]);

        $product->comments()->save($comment);

        return new CommentResource($comment);
    }
}
