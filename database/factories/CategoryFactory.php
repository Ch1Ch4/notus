<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Category>
 */
class CategoryFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $parent = Category::inRandomOrder()->where('depth', '<', 3)->first();

        return [
            'name' => fake()->word(),
            'parent_id' => $parent?->id,
            'depth' => $parent ? $parent->depth + 1 : 1,
        ];
    }
}
