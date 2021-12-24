@extends('layouts.admin')

@section('content')
<div class="section-header">
    <div class="d-flex justify-content-start">
        <a href="{{ route('kinerja.index') }}" class="btn btn-warning btn-sm mr-2">Kembali</a>
    </div>
    <h1>Detail Kinerja</h1>
</div>
<div class="card">
    <div class="card-body">
        @if ($sk->status_verifikasi == 0)
        <a href="{{ route('kinerja.tambah-matkul', $sk->id) }}" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
        @endif
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
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($matkulSK as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->mata_kuliah->kode_mata_kuliah }}</td>
                            <td>{{ $item->mata_kuliah->nama_mata_kuliah }}</td>
                            <td>{{ $item->mata_kuliah->sks }}</td>
                            <td>{{ $item->mata_kuliah->semester }}</td>
                            <td>{{ $item->jumlah_mahasiswa }}</td>
                            <td>{{ $item->jumlah_jam }}</td>
                            <td>{{ $item->tugas_dalam_perkuliahan }}</td>
                            <td>{{ number_format($item->sks_bagian, 3) }}</td>
                            <td>
                                <a href="{{ route('kinerja.edit-matkul', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('kinerja.destroy_matkul', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="10">-- Data Kosong --</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('addon-script')
    <script src="{{ url('js//sweetalert2.all.min.js') }}"></script>

    <script>
        $('.btn-hapus').on('click', function (e) {
            e.preventDefault(); // prevent form submit
            var form = event.target.form;
            Swal.fire({
            title: 'Yakin Menghapus Data?',
            text: "Data Akan Terhapus Permanen",
            icon: 'warning',
            allowOutsideClick: false,
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Hapus',
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

    @if ($message = Session::get('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Berhasil',
            text: '{{ $message }}'
        })
    </script>
    @endif
@endpush
