<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;
    protected $with = ["user"];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
    public function favories()
    {
        return $this->hasMany(Favorie::class);
    }
    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
    public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
