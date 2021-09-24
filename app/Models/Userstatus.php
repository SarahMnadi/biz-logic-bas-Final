<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Userstatus extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'fingerprint_id',
        'enrollment_status',
        'ready_to_enroll',
        'delete_status',
        'card_registered',
        'ready_to_add_card',
        'card_uid'
    ];

    public function user(){
        return $this->belongsTo(User::class, 'user_id');
    }
}
