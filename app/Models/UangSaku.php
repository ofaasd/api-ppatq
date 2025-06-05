<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UangSaku extends Model
{
    use HasFactory;
    
    protected $dateFormat = 'U';

    protected $table = 'tb_uang_saku';
    protected $guarded = ['id'];
}
