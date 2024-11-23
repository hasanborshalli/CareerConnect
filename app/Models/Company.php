<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Laravel\Scout\Searchable;

class Company extends Model
{
    use HasFactory, Notifiable,SoftDeletes,Searchable;

    protected $dates = ['deleted_at'];

    protected $fillable = [
        'name',
        'user_id',
        'avatar',
        'slogan',
        'special',
        'description',
        'phone',
        'address',
       

    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function jobs()
    {
        return $this->hasMany(Job::class, 'company_id');
    }
    public function toSearchableArray()
    {

        return [
            'name' => $this->name,
        ];
    }
}