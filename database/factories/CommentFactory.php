<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comment>
 */
class CommentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'author' =>  fake()->word(),
            'email' => fake()->email(),
            'content' =>  fake()->realText('50'),
            'rating' =>  fake()->numberBetween(1,5),
            'product_id' =>  fake()->numberBetween(1,10),
        ];
    }
}
