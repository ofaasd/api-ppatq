<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Keluhan extends Model
{
    use HasFactory;
    protected $table = 'tb_keluhan';
    protected $fillable = [
        'id',
        'nama_pelapor',
        'email',
        'no_hp',
        'id_santri',
        'nama_wali_santri',
        'id_kategori',
        'masukan',
        'saran',
        'gambar',
        'status',
        'rating',
        'jenis',
        'is_hapus',
    ];
}
