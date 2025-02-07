<?php

namespace App\Http\Controllers\Api\V1;

use App\Models\Category;
use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Collection;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): JsonResource
    {
        $categories = Category::paginate(10);

        return CategoryResource::collection($categories);
    }

    public function show(Category $category): CategoryResource|JsonResource
    {
        return new CategoryResource($category);
    }
}
