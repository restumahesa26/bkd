@extends('layouts.admin')

@section('content')
<div class="section-header">
    <div class="d-flex justify-content-start">
        <a href="{{ route('data-pimpinan.index') }}" class="btn btn-warning btn-sm mr-2">Kembali</a>
    </div>
    <h1>Ubah Pimpinan</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('data-pimpinan.update', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="form-group col-lg-6">
                    <label for="nama">Nama</label>
                    <input type="text" name="nama" id="nama" class="form-control" value="{{ old('nama', $item->nama) }}" placeholder="Masukkan Nama.." required>
                </div>
                <div class="form-group col-lg-6">
                    <label for="nip">NIP</label>
                    <input type="text" name="nip" id="nip" class="form-control" value="{{ old('nip', $item->nip) }}" placeholder="Masukkan NIP.." required>
                </div>
                <div class="form-group col-lg-6">
                    <label for="semester">Semester</label>
                    <select name="semester" id="semester" class="form-control" required>
                        <option value="" hidden>--Pilih Semester--</option>
                        <option value="GANJIL" @if(old('semester', $item->semester) == 'GANJIL') selected @endif>GANJIL</option>
                        <option value="GENAP" @if(old('semester', $item->semester) == 'GENAP') selected @endif>GENAP</option>
                    </select>
                </div>
                <div class="form-group col-lg-6">
                    <label for="tahun_akademik">Tahun Akademik <sup class="text-danger" style="font-weight: bold">* contoh : 2020 / 2021</sup></label>
                    <input type="text" name="tahun_akademik" id="tahun_akademik" class="form-control" value="{{ old('tahun_akademik', $item->tahun_akademik) }}" placeholder="Masukkan Tahun Akademik.." required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>
</div>
@endsection
