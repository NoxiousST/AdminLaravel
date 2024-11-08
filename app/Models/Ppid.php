<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ppid extends Model
{
    protected $fillable = [
        'id_kategori',
        'nama_dokumen',
        'file1',
        'deleted',
    ];

    public function kategori(): BelongsTo
    {
        return $this->belongsTo(KategoriPpid::class, 'id_kategori', 'id');
    }
}
