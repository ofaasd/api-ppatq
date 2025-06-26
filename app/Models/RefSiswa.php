<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class RefSiswa extends Authenticatable
{
    use HasFactory, HasApiTokens;

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

    public function findForPassport($username)
    {
        return $this->where('no_induk', $username)->first();
    }

    public function validateForPassportPasswordGrant($password)
    {
        return $this->kode == $password;
    }

}
