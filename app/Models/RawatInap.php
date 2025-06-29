<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatInap extends Model
{
    use HasFactory;

    protected $dateFormat = 'U';

    protected $table = 'rawat_inap';
    protected $guarded = ['id'];
}
