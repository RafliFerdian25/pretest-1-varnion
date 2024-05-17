<?php

namespace Database\Seeders;

use App\Models\Profesi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProfesiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['id' => 'A', 'nama_profesi' => 'Petani'],
            ['id' => 'B', 'nama_profesi' => 'Teknisi'],
            ['id' => 'C', 'nama_profesi' => 'Guru'],
            ['id' => 'D', 'nama_profesi' => 'Nelayan'],
            ['id' => 'E', 'nama_profesi' => 'Seniman'],
        ];

        // insert data ke tabel 'profesi'
        Profesi::insert($data);
    }
}
