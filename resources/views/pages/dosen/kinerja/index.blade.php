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
                        <td>{{ \Carbon\Carbon::parse($item->tanggal_surat)->translatedFormat('d F Y') }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            @if ($item->status === 'Belum Diverifikasi')
                                <a href="{{ route('kinerja.show-detail', $item->id) }}" class="btn btn-sm btn-primary">Lihat Matkul</a>
                                @if ($item->status_verifikasi == 0)
                                <a href="{{ route('kinerja.selesai', $item->id) }}" class="btn btn-sm btn-info btn-selesai">Selesai</a>
                                @else

                                @endif
                                <form action="{{ route('kinerja.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger btn-hapus">Hapus</button>
                                </form>
                            @elseif ($item->status === 'Sudah Diverifikasi')
                                -
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

    <script>
        $('.btn-selesai').on('click', function (event) {
            event.preventDefault(); // prevent form submit
            var form = $(this).attr('href');
            Swal.fire({
                title: 'Selesai Pilih Matkul?',
                text: "Silahkan Menunggu Verifikasi",
                icon: 'info',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = form;
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
