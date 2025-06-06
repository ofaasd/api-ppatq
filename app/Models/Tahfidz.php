<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tahfidz extends Model
{
    use HasFactory;
    protected $table = 'ref_tahfidz';

    protected $fillable = ['code', 'name', 'employee_id', 'tahun_ajaran_id'];

    protected $dateFormat = 'U';
}