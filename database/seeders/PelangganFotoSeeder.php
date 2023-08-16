<?php

namespace Database\Seeders;

use App\Models\PelangganFoto;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PelangganFotoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        PelangganFoto::factory()->count(28)->create();
    }
}
