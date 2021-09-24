<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use HasFactory;
    Use SoftDeletes;
   
    protected $primaryKey = 'room_id';
    public $incrementing = false;


    protected $fillable = [
        'room_id','room_name', 'room_security_level' , 'device_token'
    ];

    protected $dates = ['deleted_at'];


    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function device(){
        return $this->belongsTo(Device::class, 'device_token');
    }
    
    // public function branches(){
    //     return $this->hasMany(Branch::class, 'organization_id');
    // }

    // public function departments(){
    //     return $this->hasManyThrough(Department::class , Branch::class, 'organization_id', 'branch_id');
    // }
    // public function users(){
    //     return $this->hasMany(User::class , 'organization_id');
    // }

    // public function devices(){
    //     return $this->hasMany(Device::class , 'organization_id');
    // }

  
}
