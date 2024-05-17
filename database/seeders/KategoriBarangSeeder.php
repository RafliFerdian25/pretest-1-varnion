<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class KategoriBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode' => 'kts', 'nama' => 'Kitchen set'],
            ['kode' => 'bds', 'nama' => 'Bedroom set'],
            ['kode' => 'fms', 'nama' => 'Family room set'],
        ];

        // insert data ke tabel 'kategori_barang'
        DB::table('kategori_barang')->insert($data);
    }
}
