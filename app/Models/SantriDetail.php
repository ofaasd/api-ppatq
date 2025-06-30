<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Laravel\Passport\HasApiTokens;

class SantriDetail extends Authenticatable
{
    use HasFactory, SoftDeletes, HasApiTokens;
    protected $table = 'santri_detail';
    protected $primaryKey = 'id';
    protected $keyType = "int";
    protected $dateFormat = 'U';

    public function findForPassport($username)
    {
        return $this->where('no_induk', $username)->first();
    }

    public function validateForPassportPasswordGrant($password)
    {
        return $this->kelas == $password;
    }
}
