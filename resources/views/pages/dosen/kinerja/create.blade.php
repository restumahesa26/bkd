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
                <select name="mata_kuliah_id" id="mata_kuliah_id" class="form-control @error('mata_kuliah_id') is-invalid @enderror">
                    <option value="">--Pilih Mata Kuliah--</option>
                    @foreach ($matkul as $item)
                        <option value="{{ $item->id }}" @if(old('mata_kuliah_id') == $item->id) selected @endif>{{ $item->nama_mata_kuliah }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="jumlah_jam">Jumlah Jam</label>
                <input type="number" name="jumlah_jam" id="jumlah_jam" class="form-control @error('jumlah_jam') is-invalid @enderror" value="{{ old('jumlah_jam') }}" placeholder="Masukkan Jumlah Jam">
            </div>
            <div class="form-group">
                <label for="jumlah_mahasiswa">Jumlah Mahasiswa</label>
                <input type="number" name="jumlah_mahasiswa" id="jumlah_mahasiswa" class="form-control @error('jumlah_mahasiswa') is-invalid @enderror" value="{{ old('jumlah_mahasiswa') }}" placeholder="Masukkan Jumlah Mahasiswa">
            </div>
            <div class="form-group">
                <label for="tugas_dalam_perkuliahan">Tugas Dalam Perkuliahan</label>
                <select name="tugas_dalam_perkuliahan" id="tugas_dalam_perkuliahan" class="form-control @error('tugas_dalam_perkuliahan') is-invalid @enderror">
                    <option value="">--Pilih Tugas Dalam Perkuliahan--</option>
                    <option value="Narasumber Kuliah" @if(old('tugas_dalam_perkuliahan') == 'Narasumber Kuliah') selected @endif>Narasumber Kuliah</option>
                    <option value="Narasumber Pleno" @if(old('tugas_dalam_perkuliahan') == 'Narasumber Pleno') selected @endif>Narasumber Pleno </option>
                    <option value="Fasilitator" @if(old('tugas_dalam_perkuliahan') == 'Fasilitator ') selected @endif>Fasilitator</option>
                    <option value="Tutor" @if(old('tugas_dalam_perkuliahan') == 'Tutor') selected @endif>Tutor</option>
                    <option value="Tutor KKD" @if(old('tugas_dalam_perkuliahan') == 'Tutor KKD') selected @endif>Tutor KKD</option>
                    <option value="Penguji OSCE" @if(old('tugas_dalam_perkuliahan') == 'Penguji OSCE') selected @endif>Penguji OSCE</option>
                    <option value="Pembimbing Case Report" @if(old('tugas_dalam_perkuliahan') == 'Pembimbing Case Report') selected @endif>Pembimbing Case Report</option>
                    <option value="Pembimbing Tutorial" @if(old('tugas_dalam_perkuliahan') == 'Pembimbing Tutorial') selected @endif>Pembimbing Tutorial</option>
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
