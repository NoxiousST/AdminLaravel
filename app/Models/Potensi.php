<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Potensi extends Model
{
    protected $fillable = [
        'nama_potensi',
        'foto',
        'deleted',
    ];
}
