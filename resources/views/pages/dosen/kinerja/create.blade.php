@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Tambah Mata Kuliah</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('kinerja.store-matkul') }}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ $id }}">
            <div class="form-group">
                <label for="mata_kuliah_id">Mata Kuliah</label>
                <select name="mata_kuliah_id" id="mata_kuliah_id" class="form-control">
                    <option value="">--Pilih Mata Kuliah--</option>
                    @foreach ($matkul as $item)
                        <option value="{{ $item->id }}" @if(old('mata_kuliah_id') == $item->id) selected @endif>{{ $item->nama_mata_kuliah }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah_jam">Jumlah Jam</label>
                <input type="number" name="jumlah_jam" id="jumlah_jam" class="form-control" value="{{ old('jumlah_jam') }}">
            </div>
            <div class="form-group">
                <label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
                <input type="number" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="form-control" value="{{ old('jumlah_mahasiswa') }}">
            </div>
            <div class="form-group">
                <label for="tugas_dalam_perkuliahan">Tugas Dalam Perkuliahan</label>
                <select name="tugas_dalam_perkuliahan" id="tugas_dalam_perkuliahan" class="form-control">
                    <option value="">--Pilih Tugas Dalam Perkuliahan--</option>
                    <option value="Fasilitator" @if(old('tugas_dalam_perkuliahan') == 'Fasilitator') selected @endif>Fasilitator</option>
                    <option value="Narasumber" @if(old('tugas_dalam_perkuliahan') == 'Narasumber') selected @endif>Narasumber</option>
                    <option value="Tutor KKD" @if(old('tugas_dalam_perkuliahan') == 'Tutor KKD') selected @endif>Tutor KKD</option>
                    <option value="Pembimbing Praktikum" @if(old('tugas_dalam_perkuliahan') == 'Pembimbing Praktikum') selected @endif>Pembimbing Praktikum</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>
</div>
@endsection
