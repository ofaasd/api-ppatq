<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPenilaianKemadrasahan extends Model
{
    use HasFactory;

    protected $table = 'detail_penilaian_kemadrasahan';
    protected $guarded = ['id'];
}
