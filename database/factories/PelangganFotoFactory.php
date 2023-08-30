<?php

namespace Database\Factories;

use App\Models\PelangganFoto;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PelangganFoto>
 */
class PelangganFotoFactory extends Factory
{
    protected $model = PelangganFoto::class;
    protected $usedOdpValues = [];
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $odpValues = ['odp_1', 'odp_2', 'odp_3','odp_4','odp_5','odp_6','odp_7','odp_8','odp_9','odp_10','odp_11','odp_12','odp_13','odp_14','odp_15','odp_16','odp_17','odp_18','odp_19','odp_20','odp_21','odp_22','odp_23','odp_25','odp_26','odp_27','odp_28'];
          // Ambil nilai odp yang belum digunakan
          $availableOdpValues = array_diff($odpValues, $this->usedOdpValues);
          if (empty($availableOdpValues)) {
              // Jika semua nilai odp sudah digunakan, gunakan nilai random
              $odp = $this->faker->randomElement($odpValues);
          } else {
              // Ambil nilai odp yang belum digunakan secara acak
              $odp = $this->faker->randomElement($availableOdpValues);
              $this->usedOdpValues[] = $odp;
          }
          $statusOptions = array_merge(array_fill(0, 26, 'OK'), array_fill(0, 2, 'NOK'));
          $status = $this->faker->randomElement($statusOptions);
        return [
            'pelanggans_id' => 25, // Assuming Pelanggan IDs range from 1 to 100
            'odp' => $odp,
            'file' => fake()->word . '.png',
            'catatan' => fake()->sentence,
            // 'status' => $this->faker->randomElement(['OK', 'NOK']),
            'status' => 'PROGRESS',
            // 'catatan_keseluruhan' => fake()->sentence,
            'created_at' => fake()->dateTimeBetween('-1 year', 'now'),
            'updated_at' => fake()->dateTimeBetween('-1 year', 'now'), //
        ];
    }
}
