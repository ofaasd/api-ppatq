<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Dakwah extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'dakwah';
    protected $guarded = ['id'];
}
