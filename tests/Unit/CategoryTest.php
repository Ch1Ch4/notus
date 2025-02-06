<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_can_create_a_category()
    {
        $user = User::create([
            'name' => 'Marko',
            'email' => 'marko.radivojevic@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('marko'),
        ]);

        $this->actingAs($user);

        $category = [
            'name' => 'New Category',
            'parent_id' => null,
            'depth' => 1,
        ];

        $response = $this->post(route('categories.store'), $category);

        $this->assertDatabaseHas('categories', [
            'name' => 'New Category',
            'parent_id' => null,
            'depth' => 1,
        ]);

        $response->assertRedirect(route('categories.index'));

        $response->assertSessionHas('success', 'Category created successfully!');
    }

    /** @test */
    public function it_validates_category_creation()
    {
        $user = User::create([
            'name' => 'Marko',
            'email' => 'marko.radivojevic@gmail.com',
            'role' => 'admin',
            'password' => bcrypt('marko'),
        ]);

        $this->actingAs($user);

        $response = $this->post(route('categories.store'), [
            'name' => '',
        ]);

        $response->assertSessionHasErrors('name');
    }
}
