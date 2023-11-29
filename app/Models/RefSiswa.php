<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RefSiswa extends Model
{
    use HasFactory;

    protected $table = 'ref_siswa';
    protected $primaryKey = 'id';
    protected $keyType = "int";
    public $timestamp = true;
    public $incrementing = true;

    protected $fillable = [
        'kode', //Kelas
        'nama',  //Nama lengkap
        'no_induk', //No Induk Siswa
        'password', //menggunakan enkripsi md5 dari tahun
    ];
}
