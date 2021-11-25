<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeputusan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id', 'nomor_surat', 'tanggal_berlaku_dari', 'tanggal_berlaku_sampai', 'tanggal_surat', 'status'
    ];

    public function user(){
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
