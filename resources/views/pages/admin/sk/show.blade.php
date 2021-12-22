@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Surat Keputusan - {{ $item->user->nama }}</h1>
</div>
<div class="card">
    <div class="card-body">
        <div class="table table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Kode MatKul</th>
                        <th>Nama MatKul</th>
                        <th>SKS</th>
                        <th>Semester</th>
                        <th>Jumlah Mahasiswa</th>
                        <th>Jumlah Jam</th>
                        <th>Tugas</th>
                        <th>SKS Bagian</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($skmatkul as $item2)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item2->mata_kuliah->kode_mata_kuliah }}</td>
                            <td>{{ $item2->mata_kuliah->nama_mata_kuliah }}</td>
                            <td>{{ $item2->mata_kuliah->sks }}</td>
                            <td>{{ $item2->mata_kuliah->semester }}</td>
                            <td>{{ $item2->jumlah_mahasiswa }}</td>
                            <td>{{ $item2->jumlah_jam }}</td>
                            <td>{{ $item2->tugas_dalam_perkuliahan }}</td>
                            <td>{{ $item2->sks_bagian }}</td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="10">-- Data Kosong --</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <form action="{{ route('sk.verifikasi', $item->id) }}" method="POST" class="mt-4">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="nomor_surat">Nomor Surat</label>
                <input type="text" name="nomor_surat" id="nomor_surat" class="form-control" placeholder="Masukkan Nomor Surat" value="{{ old('nomor_surat') }}" required>
            </div>
            <div class="row">
                <div class="form-group col-lg-4">
                    <label for="tanggal_berlaku_dari">Tanggal Berlaku Dari</label>
                    <input type="date" name="tanggal_berlaku_dari" id="tanggal_berlaku_dari" class="form-control" placeholder="Masukkan Tanggal Berlaku Dari" value="{{ old('tanggal_berlaku_dari') }}" required>
                </div>
                <div class="form-group col-lg-4">
                    <label for="tanggal_berlaku_sampai">Tanggal Berlaku Sampai</label>
                    <input type="date" name="tanggal_berlaku_sampai" id="tanggal_berlaku_sampai" class="form-control" placeholder="Masukkan Tanggal Berlaku Sampai" value="{{ old('tanggal_berlaku_sampai') }}" required>
                </div>
                <div class="form-group col-lg-4">
                    <label for="tanggal_surat">Tanggal Surat</label>
                    <input type="date" name="tanggal_surat" id="tanggal_surat" class="form-control" placeholder="Masukkan Tanggal Surat" value="{{ old('tanggal_surat') }}" required>
                </div>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-edit">Verifikasi</button>
        </form>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="{{ url('js//sweetalert2.all.min.js') }}"></script>

    <script>
        $('.btn-edit').on('click', function (e) {
        e.preventDefault(); // prevent form submit
        var form = event.target.form;
        Swal.fire({
        title: 'Verifikasi Surat Keputusan?',
        text: "Data Akan Tersimpan",
        icon: 'warning',
        allowOutsideClick: false,
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Simpan',
        cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                form.submit();
            }else {
                //
            }
        });
    });
    </script>
@endpush
