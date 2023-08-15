<?php

namespace Database\Factories;

use App\Models\Pelanggan;
use App\Models\PelangganFoto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class PelangganFotoFactory extends Factory
{
    protected $model = PelangganFoto::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'pelanggans_id' => Pelanggan::factory(),
            'catatan' => $this->faker->sentence,
            'file' => $this->faker->image(storage_path('app/public/images'), 400, 300, null, false),
            'urutan' => $this->faker->unique()->numberBetween(1, 28)
        ];
    }
}
