<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::factory()->create([
            'email' => 'varnion@varnion.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Secret123'),
            'name' => 'varnion',
        ]);

        User::factory()->create([
            'email' => 'rafli@varnion.com',
            'email_verified_at' => now(),
            'password' => bcrypt('Secret123'),
            'name' => 'rafli',
        ]);

        $this->call([
            ProfesiSeeder::class,
            JenisKelaminSeeder::class,
            HasilResponseSeeder::class,
            KategoriBarangSeeder::class,
            SatuanBarangSeeder::class,
            BarangSeeder::class,
        ]);
    }
}
