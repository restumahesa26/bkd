@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>{{ Auth::user()->nama }}</h1>
</div>
@if (Auth::user()->role === 'ADMIN')
<div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-user"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Dosen</h4>
                </div>
                <div class="card-body">
                    {{ $dosen }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-danger">
                <i class="far fa-newspaper"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>Mata Kuliah</h4>
                </div>
                <div class="card-body">
                    {{ $matkul }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-warning">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>SK Belum Diverifikasi</h4>
                </div>
                <div class="card-body">
                    {{ $skblm }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-circle"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4>SK Sudah Diverifikasi</h4>
                </div>
                <div class="card-body">
                    {{ $sksdh }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@if (Auth::user()->role == 'DOSEN')
<div class="card">
    <div class="card-body">
        <h4>Selamat Datang di Website Beban Kerja Dosen Fakultas Kedokteran dan Ilmu Kesehatan.</h4>
        <h5>Silahkan untuk mengisi data pada menu kinerja dosen, agar proses verifikasi sk dosen dapat dikeluarkan.</h5>
    </div>
</div>

<div class="row">
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-primary">
                <i class="far fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4 style="color: #000">Kinerja Belum Diverifikasi</h4>
                </div>
                <div class="card-body">
                    {{ $skBelum }}
                </div>
            </div>
        </div>
    </div>
    <div class="col-lg-4 col-md-6 col-sm-6 col-12">
        <div class="card card-statistic-1">
            <div class="card-icon bg-success">
                <i class="fas fa-file"></i>
            </div>
            <div class="card-wrap">
                <div class="card-header">
                    <h4 style="color: #000">SK Sudah Diverifikasi</h4>
                </div>
                <div class="card-body">
                    {{ $skSudah }}
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
