<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $fillable = [
        'nis',
        'nama',
        'kelas',
        'jurusan',
        'username',
        'password'
    ];
}
