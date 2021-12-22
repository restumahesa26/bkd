@extends('layouts.admin')

@section('content')
<div class="section-header">
    <div class="d-flex justify-content-start">
        <a href="{{ route('mata-kuliah.index') }}" class="btn btn-warning btn-sm mr-2">Kembali</a>
    </div>
    <h1>Ubah Mata Kuliah - {{ $item->nama_mata_kuliah }}</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('mata-kuliah.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="kode_mata_kuliah">Kode Mata Kuliah</label>
                <input type="text" name="kode_mata_kuliah" id="kode_mata_kuliah" class="form-control" value="{{ $item->kode_mata_kuliah }}">
            </div>
            <div class="form-group">
                <label for="nama_mata_kuliah">Nama Mata Kuliah</label>
                <input type="text" name="nama_mata_kuliah" id="nama_mata_kuliah" class="form-control" value="{{ $item->nama_mata_kuliah }}">
            </div>
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="sks">SKS</label>
                    <input type="number" name="sks" id="sks" class="form-control" value="{{ $item->sks }}" min="1">
                </div>
                <div class="form-group col-lg-6">
                    <label for="semester">Semester</label>
                    <input type="number" name="semester" id="semester" class="form-control" value="{{ $item->semester }}" min="1" max="14">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>
</div>
@endsection
