<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Log extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [

        'user_id','log_type','time_in', 'time_out' , 'date' , 'device_token'
    ];

    public function user(){
        return $this->belongsTo(User::class , 'user_id');
    }
    public function device(){
        return $this->belongsTo(Device::class , 'device_token');
    }
}
