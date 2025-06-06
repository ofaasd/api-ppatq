<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class DetailSantriTahfidz extends Model
{
    use SoftDeletes;
    protected $table = 'detail_santri_tahfidz';
    protected $dateFormat = 'U';

    protected $casts = [
        'id_tahfidz' => 'int',
        'no_induk' => 'int',
        'bulan' => 'int',
        'tahun' => 'int',
        'id_tahun_ajaran' => 'int',
        'kode_juz_surah' => 'int',
        'created-at' => 'int',
    ];

    protected $fillable = ['id_tahfidz', 'no_induk', 'bulan', 'tahun', 'id_tahun_ajaran', 'kode_juz_surah', 'tanggal'];
}
