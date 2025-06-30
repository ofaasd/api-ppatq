<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;

class RefSiswa extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'ref_siswa';
    protected $primaryKey = 'id';
    protected $keyType = "int";
    protected $dateFormat = 'U';

    public $timestamps = true;
    public $incrementing = true;

    protected $fillable = [
        'kode', //Kelas
        'nama',  //Nama lengkap
        'no_induk', //No Induk Siswa
        'password', //menggunakan enkripsi md5 dari tahun
    ];
}
