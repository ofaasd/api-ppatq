<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TbPemeriksaan extends Model
{
    use SoftDeletes, HasFactory;
    protected $table = 'tb_pemeriksaan';
    protected $dateFormat = 'U';

    protected $guarded = ['id'];

    protected $casts = [
        'tanggal_pemeriksaan' => 'int',
        'tinggi_badan' => 'int',
        'berat_badan' => 'int',
        'lingkar_pinggul' => 'int',
        'lingkar_dada' => 'int',
    ];
}
