<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefJenisPembayaran extends Model
{
    use HasFactory;

    protected $table = 'ref_jenis_pembayaran';
    protected $guarded = ['id'];
}
