<?php

namespace Database\Seeders;

use App\Models\HasilResponse;
use Database\Factories\HasilResponseFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class HasilResponseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        HasilResponse::factory()->count(25)->create();
    }
}
