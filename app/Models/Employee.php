<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [
        'firstname', 'lastname', 'employeeid', 'joindate', 'joindate', 'phone', 'role', 'gender', 'address', 'photo', 'birthdate', 'email', 'status'
    ];
}
