<?php

namespace App\Http\Controllers;

use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('products.index', [
            'products' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('products.create', compact('categories'));

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        $product = Product::create($validated);

        if ($request->hasFile('featured_image')) {
            $this->saveProductImage($product->id, $request->file('featured_image'), true);
        }

        $product->categories()->attach($request->categories);

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $this->saveProductImage($product->id, $image, false);
            }
        }

        return redirect()->route('products.index')
            ->withSuccess('Product is created.');
    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product)
    {
        return view('products.show', [
            'product' => $product,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Product $product)
    {
        return view('products.edit', [
            'product' => $product,
            'categories' => Category::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        $validated = $request->validated();

        $product->name = $validated['name'];
        $product->description = $validated['description'];
        $product->price = $validated['price'];

        if ($request->hasFile('featured_image')) {
            $this->saveProductImage($product->id, $request->file('featured_image'), true);
        }

        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $this->saveProductImage($product->id, $image, false);
            }
        }

        $product->categories()->sync($validated['categories']);

        $product->save();

        return redirect()->route('products.edit', $product)->with('success', 'Product updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product)
    {
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product deleted successfully.');
    }

    protected function saveProductImage($productId, $image, $isFeatured = false)
    {
        $imagePath = $image->store('product_images', 'public');

        return ProductImage::create([
            'product_id' => $productId,
            'image_path' => $imagePath,
            'is_featured' => $isFeatured,
        ]);
    }
}
