<?php

namespace Database\Factories;

use App\Models\Filiale;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->title(),
            'description' => fake()->text(70),
            'image_url' => fake()->imageUrl(),
            'fialiale_id' => Filiale::factory()->create()
        ];
    }
}
