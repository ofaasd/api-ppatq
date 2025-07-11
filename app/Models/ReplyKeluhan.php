<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReplyKeluhan extends Model
{
    use HasFactory;

    protected $table = 'reply_keluhan';
    protected $guarded = ['id'];
}
