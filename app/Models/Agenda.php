<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Agenda extends Model
{
    protected $fillable = [
        'judul',
        'tgl',
        'deskripsi',
        'file1',
        'file2',
        'file3',
        'deleted',
    ];
}
