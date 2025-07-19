<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagihanSyahriah extends Model
{
    use HasFactory;

    protected $table = 'tb_tagihan_syahriah';
    protected $guarded = ['id'];
}
