<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Vehicle>
 */
class VehicleFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'brand' => fake()->randomElement(['Ford', 'Fiat', 'Chevrolet', 'Mercedes', 'Toyota']),
            'model' => fake()->randomElement(['Ford', 'Fiat', 'Chevrolet', 'Mercedes', 'Toyota']),
            'year' => fake()->year(),
            'color' => fake()->colorName(),
            'plate' => fake()->unique()->bothify('???##?##'),
            'driver_id' => \App\Models\Driver::factory(),
        ];
    }
}
