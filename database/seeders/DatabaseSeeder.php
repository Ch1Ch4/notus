<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // User::factory(10)->create();

        User::factory()->create([
            'name' => 'Admin',
            'email' => 'admin@example.com',
            'role' => 'admin',
        ]);

        User::factory()->create([
            'name' => 'Moderator',
            'email' => 'moderator@example.com',
            'role' => 'moderator',
        ]);

        $this->call([
            CategorySeeder::class,
            ProductSeeder::class,
            CommentSeeder::class,
        ]);
    }
}
