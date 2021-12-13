@extends('layouts.admin')

@section('content')
<div class="section-header">
    <h1>Selamat Datang, {{ Auth::user()->nama }}</h1>
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
@endsection
