<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kerapian extends Model
{
    use HasFactory;

    protected $table = 'kerapian';
    protected $guarded = ['id'];
}
