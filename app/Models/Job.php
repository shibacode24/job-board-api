<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    protected $fillable = [
        'title', 
        'description', 
        'company', 
        'location', 
        'salary', 
        'user_id'
    ];

    public function applications()
    {
        return $this->hasMany(Application::class);
    }

    public function user()
{
    return $this->belongsToMany(User::class);
}
}
