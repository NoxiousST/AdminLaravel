<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Artikel extends Model
{
    protected $fillable = [
        'id_kategori',
        'judul',
        'tgl',
        'deskripsi',
        'file1',
        'file2',
        'file3',
        'deleted',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriArtikel::class, 'id_kategori', 'id');
    }
}
