@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Tambah Mata Kuliah</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('mata-kuliah.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="kode_mata_kuliah">Kode Mata Kuliah</label>
                <input type="text" name="kode_mata_kuliah" id="kode_mata_kuliah" class="form-control" value="{{ old('kode_mata_kuliah') }}" placeholder="Masukkan Kode Mata Kuliah..">
            </div>
            <div class="form-group">
                <label for="nama_mata_kuliah">Nama Mata Kuliah</label>
                <input type="text" name="nama_mata_kuliah" id="nama_mata_kuliah" class="form-control" value="{{ old('nama_mata_kuliah') }}" placeholder="Masukkan Nama Mata Kuliah..">
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="sks">SKS</label>
                    <input type="number" name="sks" id="sks" class="form-control" value="{{ old('sks') }}" min="1" placeholder="Masukkan SKS..">
                </div>
                <div class="form-group col-lg-6">
                    <label for="semester">Semester</label>
                    <input type="number" name="semester" id="semester" class="form-control" value="{{ old('semester') }}" min="1" max="14" placeholder="Masukkan Semester..">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>
</div>
@endsection
