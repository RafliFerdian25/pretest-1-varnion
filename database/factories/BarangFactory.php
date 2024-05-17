<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Barang>
 */
class BarangFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->firstName(),
            'kode' => $this->faker->unique()->bothify('##?#?#'),
            'jumlah' => $this->faker->randomNumber(2),
            'kd_kategori' => $this->faker->randomElement(['kts', 'bds', 'fms']),
            'kd_satuan' => $this->faker->randomElement(['kg', 'm', 'lt']),
            'id_user_insert' => $this->faker->randomNumber(2),
        ];
    }
}
