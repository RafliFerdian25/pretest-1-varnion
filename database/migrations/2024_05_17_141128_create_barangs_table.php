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
        Schema::create('barang', function (Blueprint $table) {
            $table->id();
            $table->string('kd_kategori', 50);
            $table->foreign('kd_kategori')->references('kode')->on('kategori_barang');
            $table->string('kd_satuan', 25);
            $table->foreign('kd_satuan')->references('kode')->on('satuan_barang');
            $table->string('kode', 6)->unique();
            $table->string('nama', 20)->unique();
            $table->integer('jumlah')->nullable()->max(100);
            $table->bigInteger('id_user_insert');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('barang');
    }
};
