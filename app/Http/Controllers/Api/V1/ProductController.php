<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request): JsonResource
    {
        $filters = $request->only(['category_id', 'min_price', 'max_price']);

        $categories = Product::with('categories', 'images')
            ->filterByCategory($filters)
            ->filterByPrice($filters)
            ->paginate(10);
        return ProductResource::collection($categories);
    }

    public function show(Product $product): ProductResource|JsonResource
    {
        return new ProductResource($product);
    }
}
