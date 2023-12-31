<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'uers_ci';
    protected $primaryKey = 'id';
    protected $keyType = "int";
    public $timestamp = true;
    public $incrementing = true;

    protected $fillable = [
        'password',
        'name',
        'email',
    ];
}
