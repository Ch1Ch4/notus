<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Product;
use App\Models\ProductImage;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Product::factory(50)->create()->each(function ($product) {
            $categories = Category::inRandomOrder()->limit(rand(1, 3))->pluck('id');
            $product->categories()->attach($categories);

            $product->images()->inRandomOrder()->first()?->update(['is_featured' => true]);
        });
    }
}
