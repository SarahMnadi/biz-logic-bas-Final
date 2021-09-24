<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;
    protected $table = "employees";
    protected $fillable = [
        'user_id',
        'first_name',
        'fingerprint_device_token',
        'User_name',
        'phone_number',
        'department',
        'email',
        'password',
    ];
}
