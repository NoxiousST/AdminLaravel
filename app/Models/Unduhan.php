<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Unduhan extends Model
{
    protected $fillable = [
        'id_kategori',
        'deskripsi',
        'file',
        'deleted',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriUnduhan::class, 'id_kategori', 'id');
    }
}
