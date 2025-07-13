<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PelanggaranKetertiban extends Model
{
    use HasFactory;

    protected $table = 'pelanggaran_ketertiban';
    protected $guarded = ['id'];
}
