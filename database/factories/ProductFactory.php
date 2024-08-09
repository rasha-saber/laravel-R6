<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Product>
 */
class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    private function generateRandomImage($path)
    {
        $files = scandir($path);
        $files = array_diff($files, array('.', '..'));

        return fake()->randomElement($files);
    }
    public function definition(): array
    {
        return [
            'image' => $this->generateRandomImage(public_path('assets/images/products')),

        //    'image' => basename(fake()->image(public_path('assets/images/products'))),
        
            'title' => fake()->word(),
            'price'=> fake()->randomFloat('price', 8, 2), 
            'short_description'  => fake()->text(),
        ];
    }
}
