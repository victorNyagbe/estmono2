<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\About>
 */
class AboutFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "text" => fake()->paragraphs(5, true),
            "image" => fake()->image("storage/app/public/abouts", 640, 480, null, false),
        ];
    }

    public function subtitle(): Factory {
        return $this->state(function (array $attributes) {
            return [
                'subtitle' => Str::substr($attributes['text'], 0, 100)
            ];
        });
    }
}
