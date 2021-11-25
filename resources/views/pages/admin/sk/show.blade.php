@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Surat Keputusan - {{ $item->user->nama }}</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('sk.verifikasi', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nomor_surat">Nomor Surat</label>
                <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" placeholder="Masukkan Nomor Surat" value="{{ old('nomor_surat') }}">
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="tanggal_berlaku_dari">Tanggal Berlaku Dari</label>
                    <input type="date" name="tanggal_berlaku_dari" id="tanggal_berlaku_dari" class="form-control" placeholder="Masukkan Tanggal Berlaku Dari" value="{{ old('tanggal_berlaku_dari') }}">
                </div>
                <div class="form-group col-lg-4">
                    <label for="tanggal_berlaku_sampai">Tanggal Berlaku Sampai</label>
                    <input type="date" name="tanggal_berlaku_sampai" id="tanggal_berlaku_sampai" class="form-control" placeholder="Masukkan Tanggal Berlaku Sampai" value="{{ old('tanggal_berlaku_sampai') }}">
                </div>
                <div class="form-group col-lg-4">
                    <label for="tanggal_surat">Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" placeholder="Masukkan Tanggal Surat" value="{{ old('tanggal_surat') }}">
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Verifikasi</button>
        </form>
    </div>
</div>
@endsection
