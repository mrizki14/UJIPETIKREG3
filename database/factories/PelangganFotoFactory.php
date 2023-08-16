<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PelangganFoto>
 */
class PelangganFotoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pelanggans_id' => 15, // Assuming Pelanggan IDs range from 1 to 100
            'odp' => fake()->unique()->word,
            'file' => fake()->word . '.png',
            'catatan' => fake()->sentence,
            'status' => fake()->randomElement(['Y', 'N']),
            'catatan_keseluruhan' => fake()->sentence,
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now'), //
        ];
    }
}
