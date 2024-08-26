<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    use HasFactory;
    protected $fillable = ['user_id', 'job_id', 'cover_letter', 'status'];

    public function jobs()
    {
        return $this->belongsTo(Job::class,'job_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
}
