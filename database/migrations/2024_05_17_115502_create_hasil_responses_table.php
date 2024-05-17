<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('hasil_response', function (Blueprint $table) {
            $table->id();
            $table->tinyInteger('jenis_kelamin');
            $table->foreign('jenis_kelamin')->references('id')->on('jenis_kelamin');
            $table->string('nama');
            $table->string('nama_jalan');
            $table->string('email');
            $table->integer('angka_kurang');
            $table->integer('angka_lebih');
            $table->char('profesi', 1);
            $table->foreign('profesi')->references('id')->on('profesi');
            $table->json('plain_json');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hasil_response');
    }
};
