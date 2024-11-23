<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class Seeker extends Model
{
    use HasFactory, Notifiable,SoftDeletes;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'fname',
        'lname',
        'phone',
        'address',
        'avatar',
        'description',
        'jobType',
        'jobLocation',
        'skills',
        'goals',
        'user_id',
        'resume',
        'workTitle'

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

}