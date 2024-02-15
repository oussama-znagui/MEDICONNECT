<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Specialty extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'specialty',
    ];

    public function medicins()
    {
        return $this->hasMany(Medicin::class);
    }
    public function doctors()
    {
        return $this->hasMany(Doctor::class);
    }
}
