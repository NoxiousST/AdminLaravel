<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProfilPotensi extends Model
{
    protected $fillable = [
        'id_kategori',
        'nama_tempat',
        'deskripsi',
        'file1',
        'file2',
        'file3',
        'deleted',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(Potensi::class, 'id_kategori', 'id');
    }
}
