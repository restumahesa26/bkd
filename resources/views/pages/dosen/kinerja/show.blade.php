@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Detail Kinerja</h1>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('kinerja.tambah-matkul', $sk->id) }}" class="btn btn-primary mb-3">Tambah Mata Kuliah</a>
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
                            <td>{{ $item->sks_bagian }}</td>
                            <td>
                                <a href="{{ route('mata-kuliah.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('mata-kuliah.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="7">-- Data Kosong --</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
