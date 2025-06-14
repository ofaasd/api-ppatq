<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SakuMasuk extends Model
{
    use HasFactory;

    protected $dateFormat = 'U';
    
    protected $table = 'tb_saku_masuk';
    protected $guarded = ['id'];
}
