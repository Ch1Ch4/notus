<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $parent = Category::create(['name' => 'Clothing', 'depth' => 1]);

        $sub1 = Category::create(['name' => 'Men', 'parent_id' => $parent->id, 'depth' => 2]);
        $sub2 = Category::create(['name' => 'Women', 'parent_id' => $parent->id, 'depth' => 2]);
        $sub3 = Category::create(['name' => 'Girls', 'parent_id' => $parent->id, 'depth' => 2]);
        $sub4 = Category::create(['name' => 'Boys', 'parent_id' => $parent->id, 'depth' => 2]);

        Category::create(['name' => 'Accessories', 'parent_id' => $sub1->id, 'depth' => 3]);
        Category::create(['name' => 'Shoes', 'parent_id' => $sub2->id, 'depth' => 3]);
    }
}
