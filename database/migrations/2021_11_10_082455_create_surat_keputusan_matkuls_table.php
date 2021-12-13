<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuratKeputusanMatkulsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('surat_keputusan_matkuls', function (Blueprint $table) {
            $table->id();
            $table->foreignId('surat_keputusan_id')->references('id')->on('surat_keputusans');
            $table->foreignId('mata_kuliah_id')->references('id')->on('mata_kuliahs');
            $table->integer('jumlah_jam')->nullable();
            $table->string('tugas_dalam_perkuliahan');
            $table->integer('jumlah_mahasiswa')->nullable();
            $table->float('sks_bagian', 8,5);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('surat_keputusan_matkuls');
    }
}
