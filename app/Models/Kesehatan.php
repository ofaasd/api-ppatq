<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Kesehatan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $dateFormat = 'U';

    protected $table = 'tb_kesehatan';
    protected $guarded = ['id'];
}
