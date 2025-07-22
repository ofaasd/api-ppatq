<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UangMasuk extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'tb_uang_masuk';
    protected $guarded = ['id'];
}
