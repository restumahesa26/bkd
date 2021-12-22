@extends('layouts.admin')

@section('content')
<div class="section-header">
    <div class="d-flex justify-content-start">
        <a href="{{ route('data-dosen.index') }}" class="btn btn-warning btn-sm mr-2">Kembali</a>
    </div>
    <h1>Edit Data Dosen - {{ $item->user->nama }}</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('data-dosen.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nama">Nama</label>
                <input type="text" name="nama" id="nama" class="form-control" value="{{ $item->user->nama }}">
            </div>
            <div class="form-group">
                <label for="nip">NIP</label>
                <input type="text" name="nip" id="nip" class="form-control" value="{{ $item->nip }}">
            </div>
            <div class="form-group">
                <label for="jenis_kelamin">Jenis Kelamin</label>
                <select name="jenis_kelamin" id="jenis_kelamin" class="form-control">
                    <option value="">--Pilih Jenis Kelamin--</option>
                    <option value="L" @if($item->jenis_kelamin === 'L') selected @endif>Laki-Laki</option>
                    <option value="P" @if($item->jenis_kelamin === 'P') selected @endif>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="prodi">Prodi</label>
                <input type="text" name="prodi" id="prodi" class="form-control" value="{{ $item->prodi }}">
            </div>
            <div class="form-group">
                <label for="fakultas">Fakultas</label>
                <input type="text" name="fakultas" id="fakultas" class="form-control" value="{{ $item->fakultas }}">
            </div>
            <div class="form-group">
                <label for="jabatan">Jabatan</label>
                <input type="text" name="jabatan" id="jabatan" class="form-control" value="{{ $item->jabatan }}">
            </div>
            <div class="form-group">
                <label for="golongan">Golongan</label>
                <input type="text" name="golongan" id="golongan" class="form-control" value="{{ $item->golongan }}">
            </div>
            <div class="form-group">
                <label for="no_telepon">No. Telepon</label>
                <input type="number" name="no_telepon" id="no_telepon" class="form-control" value="{{ $item->no_telepon }}">
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ $item->user->email }}">
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control">
            </div>
            <div class="form-group">
                <label for="password_confirmation">Konfirmasi Password</label>
                <input type="password" name="password_confirmation" id="password_confirmation" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>
</div>
@endsection
