<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable , SoftDeletes;
    protected $primaryKey = 'user_id';
    public $incrementing = false;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'first_name',
        'fingerprint_device_token',
        'rfid_device_token',
        'middle_name',
        'last_name',
        'phone_number',
        'birth_date',
        'department_id',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    protected $dates = ['deleted_at' , 'date_of_birth'];



    public function roles(){
        return $this->belongsToMany(Role::class);
    }
    public function organization(){
        return $this->belongsTo(Organization::class , 'organization_id');
    }
    public function branch(){
        return $this->belongsTo(Branch::class , 'branch_id');
    }
    public function department(){
        return $this->belongsTo(Department::class , 'department_id');
    }
    public function rooms(){
        return $this->belongsToMany(Room::class );
    }
   
   

    public function status(){
        return $this->hasOne(Userstatus::class, 'user_id');
    }

    public function fingerprintDevice(){
        return $this->belongsTo(Device::class , 'fingerprint_device_token');
    }
    public function rfidDevice(){
        return $this->belongsTo(Device::class , 'rfid_device_token');
    }

    public function logs(){
        return $this->hasMany(Log::class , 'user_id');
    }

    public function hasAnyRoles($roles){
        if($this->roles()->whereIn('name' , $roles)->first()){
            return true;
        }
        
        return false;
    }
    public function hasRole($role){
        if($this->roles()->where('name' , $role)->first()){
            return true;
        }
        
        return false;
    }
}
