<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProdukHukum extends Model
{
    protected $fillable = [
        'id_kategori',
        'judul',
        'tgl',
        'deskripsi',
        'file1',
        'deleted',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriBerita::class, 'id_kategori', 'id');
    }
}
