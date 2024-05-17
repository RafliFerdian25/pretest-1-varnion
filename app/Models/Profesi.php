<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profesi extends Model
{
    use HasFactory;

    protected $table = 'profesi';

    protected $fillable = [
        'id',
        'nama_profesi',
    ];

    protected $casts = [
        'id' => 'string',
    ];
}
