<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    protected $fillable = [
        'nama_desa',
        'sambutan',
        'profil',
        'visi',
        'misi',
        'tupoksi',
        'sejarah',
        'wilayah_desa',
        'alamat',
        'iframe_maps',
        'nomor_telepon',
        'file',
        'file2',
        'file3',
    ];
}
