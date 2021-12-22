@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Data Dosen</h1>
</div>
<div class="card">
    <div class="card-body">
        <a href="{{ route('data-dosen.create') }}" class="btn btn-primary mb-3">Tambah Dosen</a>
        <div class="table table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIP</th>
                        <th>Nama</th>
                        <th>Jabatan</th>
                        <th>Golongan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nip }}</td>
                            <td>{{ $item->user->nama }}</td>
                            <td>{{ $item->jabatan }}</td>
                            <td>{{ $item->golongan }}</td>
                            <td>
                                <a href="{{ route('data-dosen.edit', $item->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('data-dosen.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @empty
                        <tr class="text-center">
                            <td colspan="6">-- Data Kosong --</td>
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

    @if ($message = Session::get('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Gagal',
            text: '{{ $message }}'
        })
    </script>
    @endif

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
