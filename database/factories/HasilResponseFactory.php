<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HasilResponse>
 */
class HasilResponseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'nama' => $this->faker->name,
            'nama_jalan' => $this->faker->streetName,
            'email' => $this->faker->unique()->safeEmail,
            'jenis_kelamin' => $this->faker->randomElement(['1', '2']),
            'profesi' => $this->faker->randomElement(['A', 'B', 'C', 'D', 'E']),
            'angka_kurang' => $this->faker->numberBetween(0, 20),
            'angka_lebih' => $this->faker->numberBetween(0, 20),
            'plain_json' => json_encode([
                'results' => [
                    [],
                ],
            ]),
        ];
    }
}
