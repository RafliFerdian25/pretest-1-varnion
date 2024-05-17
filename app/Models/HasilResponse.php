<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HasilResponse extends Model
{
    use HasFactory;

    protected $table = 'hasil_response';

    protected $guarded = [
        'id'
    ];

    public function profession()
    {
        return $this->belongsTo(Profesi::class, 'profesi', 'id');
    }

    public function gender()
    {
        return $this->belongsTo(JenisKelamin::class, 'jenis_kelamin', 'id');
    }
}
