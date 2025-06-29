<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kesehatan extends Model
{
    use HasFactory;
    
    protected $dateFormat = 'U';

    protected $table = 'tb_kesehatan';
    protected $guarded = ['id'];
}
