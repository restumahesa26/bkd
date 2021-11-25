<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeputusanMatkul extends Model
{
    use HasFactory;

    protected $fillable = [
        'surat_keputusan_id', 'mata_kuliah_id', 'jumlah_jam', 'tugas_dalam_perkuliahan', 'jumlah_mahasiswa', 'sks_bagian'
    ];

    public function mata_kuliah(){
        return $this->hasOne(MataKuliah::class, 'id', 'mata_kuliah_id')->orderBy('kode_mata_kuliah', 'asc');
    }
}
