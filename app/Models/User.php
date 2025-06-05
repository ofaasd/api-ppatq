<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    use HasFactory;
    protected $table = 'users';
    protected $primaryKey = 'id';
    protected $keyType = "int";
    public $timestamp = true;
    public $incrementing = true;
    
    protected $guarded = ["id"];
    // protected $fillable = [
    //     'password',
    //     'name',
    //     'email',
    // ];
}
