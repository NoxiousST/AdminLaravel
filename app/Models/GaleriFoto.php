<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GaleriFoto extends Model
{
    protected $fillable = [
        'judul',
        'file1',
        'file2',
        'file3',
        'file4',
        'file5',
        'deleted',
    ];
}
