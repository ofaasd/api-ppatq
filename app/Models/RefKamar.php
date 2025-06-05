<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefKamar extends Model
{
    use HasFactory;

    protected $table = 'ref_kamar';
    protected $guarded = ['id'];
}
