<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Barang extends Model
{
    use HasFactory;

    protected $table = 'barang';

    protected $guarded = ['id'];

    public function category()
    {
        return $this->belongsTo(KategoriBarang::class, 'kd_kategori', 'kode');
    }

    public function unit()
    {
        return $this->belongsTo(SatuanBarang::class, 'kd_satuan', 'kode');
    }
}
