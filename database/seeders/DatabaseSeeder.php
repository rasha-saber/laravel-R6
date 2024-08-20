<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\car;
use App\Models\Product;
use App\Models\category;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory(10)->create();
        category::factory(10)->create();
        car::factory(10)->create();

        // Product::factory(100)->create();
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
