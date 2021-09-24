<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Department extends Model
{
    use HasFactory;
    Use SoftDeletes;

    protected $primaryKey = 'department_id';
    public $incrementing = false;


    protected $fillable = [
        'department_id','organization_id','department_name', 'department_phone_number', 'department_email', 'department_address'
    ];

    protected $dates = ['deleted_at' , 'date_of_birth'];

    public function branch(){
        return $this->belongsTo(Branch::class , 'branch_id');
    }

    public function users(){
        return $this->hasMany(User::class , 'department_id');
    }
    public function devices(){
        return $this->hasMany(Device::class , 'department_id');
    }
}
