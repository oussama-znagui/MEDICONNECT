<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Medicin extends Model
{
    use HasFactory;

    protected $fillable = [
        'medicin',
        'specialty_id',
    ];

    public function specialty()
    {
        return $this->belongsTo(Specialty::class);
    }
}
