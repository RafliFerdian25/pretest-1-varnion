<?php

namespace Database\Seeders;

use App\Models\JenisKelamin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JenisKelaminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 1, 'jenis_kelamin' => 'Laki-laki'],
            ['id' => 2, 'jenis_kelamin' => 'Perempuan'],
        ];

        JenisKelamin::insert($data);
    }
}
