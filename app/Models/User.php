<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    protected $primaryKey = 'id_user';

    protected $fillable = [
        'username',
        'pwd',
        'is_admin',
        'id_kabupaten',
        'fullname',
        'NIP',
        'email',
        'telp',
        'batas',
        'isok',
        'deleted',
    ];
}
