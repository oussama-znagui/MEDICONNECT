<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Medicin extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'medicin',
        'specialty_id',
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}
