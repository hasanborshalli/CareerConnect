<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public function jobs()
    {
        return $this->hasMany(Job::class, 'category_id');
    }
}