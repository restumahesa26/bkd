@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Surat Keputusan</h1>
</div>
<div class="card">
    <div class="card-body">
        <h4>SK yang belum diverifikasi</h4>
        <div class="table table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->user->nama }}</td>
                        <td>{{ $item->user->dosen->nip }}</td>
                        <td>
                            <a href="{{ route('sk.show', $item->id) }}" class="btn btn-sm btn-primary">Verifikasi</a>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="5">--Data Kosong--</td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-body">
        <h4>SK yang sudah diverifikasi</h4>
        <div class="table table-responsive">
            <table class="table table-bordered table-hover text-nowrap">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama</th>
                        <th>NIP</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($items2 as $item2)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item2->user->nama }}</td>
                        <td>{{ $item2->user->dosen->nip }}</td>
                        <td>
                            <a href="{{ route('kinerja.cetak', $item2->id) }}" class="btn btn-sm btn-primary" target="_blank">Cetak</a>
                        </td>
                    </tr>
                    @empty
                    <tr class="text-center">
                        <td colspan="5">--Data Kosong--</td>
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
