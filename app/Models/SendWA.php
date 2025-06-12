<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SendWA extends Model
{
    use HasFactory;

    protected $table = 'tb_send_wa';
    protected $guarded = ['id'];
}
