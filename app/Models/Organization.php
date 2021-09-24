<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Organization extends Model
{
    use HasFactory;
    Use SoftDeletes;
   
    protected $primaryKey = 'organization_id';
    public $incrementing = false;


    protected $fillable = [
        'organization_id','organization_name', 'organization_phone_number', 'organization_email', 'organization_address'
    ];

    protected $dates = ['deleted_at' , 'date_of_birth'];


    
    public function branches(){
        return $this->hasMany(Branch::class, 'organization_id');
    }

    public function departments(){
        return $this->hasManyThrough(Department::class , Branch::class, 'organization_id', 'branch_id');
    }
    public function users(){
        return $this->hasMany(User::class , 'organization_id');
    }

    public function devices(){
        return $this->hasMany(Device::class , 'organization_id');
    }

  

    

}
