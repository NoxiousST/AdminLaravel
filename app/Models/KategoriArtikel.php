<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class KategoriArtikel extends Model
{
    protected $fillable = [
        'kategori',
        'deleted',
    ];
}
