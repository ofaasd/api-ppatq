<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeeNew extends Model
{
    use HasFactory;

    protected $table = 'employee_new';
    protected $guarded = ['id'];
}
