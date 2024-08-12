<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Car>
 */
class CarFactory extends Factory
{
    private function generateRandomImage($path)
    {
        $files = scandir($path);
        $files = array_diff($files, array('.', '..'));

        return fake()->randomElement($files);
    }
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'carTitle' => fake()->randomElement(['BMW', 'Mercedes', 'Fiat Tipo']),
            'description'  => fake()->text(),
            
            'price' => fake()->randomFloat(2),
            'published'  => fake()->numberBetween(0, 1),
            // 'image' => basename(fake()->image(public_path('assets/images/cars'))),
            'image' => $this->generateRandomImage(public_path('assets/images/cars/')),
            'category_id'=> fake()->numberBetween(1, 2),
            // 'image' => basename($this->faker->image(public_path('assets/images/cars'), 640, 480, 'transport', false)),
        ];
    }
    
}