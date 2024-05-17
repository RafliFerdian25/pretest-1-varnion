<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SatuanBarangSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = [
            ['kode' => 'kg', 'nama' => 'Kilogram'],
            ['kode' => 'm', 'nama' => 'Meter'],
            ['kode' => 'lt', 'nama' => 'Liter'],
        ];

        // insert data ke tabel 'satuan_barang'
        DB::table('satuan_barang')->insert($data);
    }
}
