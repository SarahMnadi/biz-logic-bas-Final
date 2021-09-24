<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Device extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $primaryKey = 'device_token';
    public $incrementing = false;

    protected $fillable = [
        'device_token','device_name','device_type', 'department_id','device_mode',
    ];

    protected $dates = ['deleted_at' , 'date_of_birth'];

    public function organization(){
        return $this->belongsTo(Organization::class , 'organization_id');
    }
    public function branch(){
        return $this->belongsTo(Branch::class , 'branch_id');
    }
    public function department(){
        return $this->belongsTo(Department::class, 'department_id');
    }

    public function fingerprintUsers(){
        return $this->hasMany(User::class , 'fingerprint_device_token');
    }
    public function rfidUsers(){
        return $this->hasMany(User::class , 'rfid_device_token');
    }
    public function room(){
        return $this->hasOne(Room::class, 'device_token');
    }

    public function logs(){
        return $this->hasMany(Log::class , 'log_id');
    }
}
