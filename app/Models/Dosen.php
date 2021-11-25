<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nip', 'jabatan', 'golongan', 'jenis_kelamin', 'no_telepon', 'prodi', 'fakultas'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
