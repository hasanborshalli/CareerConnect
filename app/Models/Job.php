<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;
use Laravel\Scout\Searchable;

class Job extends Model
{
    use HasFactory, Notifiable,SoftDeletes,Searchable;

    protected $dates = ['deleted_at'];
    protected $fillable = [
        'company_id',
        'category_id',
        'title',
        'location',
        'salary',
        'description',
        'responsibility',
        'requirement',
    ];


    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function applications()
    {
        return $this->hasMany(Application::class, 'job_id');
    }
    public function is_applied_by_user()
    {
        return $this->applications()->where('user_id', Auth::id())->exists();
    }
    
    public function toSearchableArray()
    {

        return [
            'title' => $this->title,
        ];
    }
}