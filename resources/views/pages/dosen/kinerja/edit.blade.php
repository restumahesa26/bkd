@extends('layouts.admin')

@section('content')
<div class="section-header">
    <div class="d-flex justify-content-start">
        <a href="{{ route('kinerja.show-detail', $item->surat_keputusan_id) }}" class="btn btn-warning btn-sm mr-2">Kembali</a>
    </div>
    <h1>Ubah Mata Kuliah</h1>
</div>
<div class="card">
    <div class="card-body">
        <form action="{{ route('kinerja.update-matkul', $item->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="mata_kuliah_id">Mata Kuliah</label>
                <select name="mata_kuliah_id" id="mata_kuliah_id" class="form-control">
                    <option value="">--Pilih Mata Kuliah--</option>
                    @foreach ($matkul as $ite)
                        <option value="{{ $ite->id }}" @if($item->mata_kuliah_id == $ite->id) selected @endif>{{ $ite->nama_mata_kuliah }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah_jam">Jumlah Jam</label>
                <input type="number" name="jumlah_jam" id="jumlah_jam" class="form-control" value="{{ $item->jumlah_jam }}" placeholder="Masukkan Jumlah Jam">
            </div>
            <div class="form-group">
                <label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
                <input type="number" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="form-control" value="{{ $item->jumlah_mahasiswa }}" placeholder="Masukkan Jumlah Mahasiswa">
            </div>
            <div class="form-group">
                <label for="tugas_dalam_perkuliahan">Tugas Dalam Perkuliahan</label>
                <select name="tugas_dalam_perkuliahan" id="tugas_dalam_perkuliahan" class="form-control">
                    <option value="">--Pilih Tugas Dalam Perkuliahan--</option>
                    <option value="Narasumber Kuliah" @if($item->tugas_dalam_perkuliahan == 'Narasumber Kuliah') selected @endif>Narasumber Kuliah</option>
                    <option value="Narasumber Pleno" @if($item->tugas_dalam_perkuliahan == 'Narasumber Pleno') selected @endif>Narasumber Pleno </option>
                    <option value="Fasilitator" @if($item->tugas_dalam_perkuliahan == 'Fasilitator ') selected @endif>Fasilitator</option>
                    <option value="Tutor" @if($item->tugas_dalam_perkuliahan == 'Tutor') selected @endif>Tutor</option>
                    <option value="Tutor KKD" @if($item->tugas_dalam_perkuliahan == 'Tutor KKD') selected @endif>Tutor KKD</option>
                    <option value="Penguji OSCE" @if($item->tugas_dalam_perkuliahan == 'Penguji OSCE') selected @endif>Penguji OSCE</option>
                    <option value="Pembimbing Case Report" @if($item->tugas_dalam_perkuliahan == 'Pembimbing Case Report') selected @endif>Pembimbing Case Report</option>
                    <option value="Pembimbing Tutorial" @if($item->tugas_dalam_perkuliahan == 'Pembimbing Tutorial') selected @endif>Pembimbing Tutorial</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary btn-block">Simpan</button>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="{{ url('js/sweetalert2.all.min.js') }}"></script>

    @if ($message = Session::get('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ $message }}'
        })
    </script>
    @endif
@endpush
