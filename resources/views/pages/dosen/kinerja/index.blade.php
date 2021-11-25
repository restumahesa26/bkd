@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Data Kinerja</h1>
</div>
<div class="card">
    <div class="card-body">
        <button type="button" class="btn btn-primary mb-3" data-toggle="modal" data-target="#modalKinerja">
            Tambah Kinerja
        </button>
        @forelse ($items as $item)
        <div class="table table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nomor Surat</th>
                        <th>Tanggal Surat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @if ($item->nomor_surat)
                                {{ $item->nomor_surat }}
                            @else
                                Belum Diverifikasi
                            @endif
                        </td>
                        <td>{{ $item->tanggal_surat }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            @if ($item->status === 'Belum Diverifikasi')
                                <a href="{{ route('kinerja.show-detail', $item->id) }}" class="btn btn-sm btn-primary">Lihat Matkul</a>
                                <form action="{{ route('kinerja.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            @elseif ($item->status === 'Sudah Diverifikasi')
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalCetak{{ $item->id }}">
                                    Cetak
                                </button>
                            @endif

                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
        @empty
        <h3 class="text-center">Belum Ada Data Kinerja</h3>
        @endforelse
    </div>
</div>
<div class="modal fade" id="modalKinerja">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah SK Kinerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin menambahkan SK Kinerja terbaru?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <form action="{{ route('kinerja.create') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-primary">Ya</button>
                </form>
            </div>
        </div>
    </div>
</div>
@foreach ($items as $item2)
<div class="modal fade" id="modalCetak{{ $item2->id }}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Cetak SK Kinerja</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Yakin ingin mencetak SK Kinerja terbaru?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Tidak</button>
                <a href="{{ route('kinerja.cetak', $item2->id) }}" class="btn btn-primary" target="_blank">Ya</a>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
