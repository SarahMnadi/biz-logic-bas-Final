<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'first_name',
        'last_name',
        'hours',
        'days',
        'overtime',
        'weekends',
        'holidays',
    ];


}
