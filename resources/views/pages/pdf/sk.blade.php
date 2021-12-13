<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <style>

        body {
            font-family: 'Times New Roman';
        }

        table tr td {
            font-size: 14px;
        }

        ol li {
            font-size: 14px;
        }

        h4 {
            font-size: 20px;
        }

        h5 {
            font-size: 14px;;
        }

        p, span {
            margin-bottom: -3px;
            font-size: 20px;
        }

        table tr td {
            padding: 3px !important;
        }
    </style>
</head>
<body>
    <div class="container" style="padding-left: 30px; padding-right: 30px;">
        <div class="row justify-content-center text-center">
            <div class="col-3">
                <img src="{{ url('logo-unib.png') }}" alt="" srcset="" style=" width: 150px; margin-left: -200px;">
            </div>
            <div class="col-9 mt-4" style="margin-left: -240px;">
                <h4>KEMENTERIAN PENDIDIKAN DAN KEBUDAYAAN</h4>
                <h4>UNIVERSITAS BENGKULU</h4>
                <h5>Jalan WR. Supratman Kandang Limun Bengkulu</h5>
                <h5>Telpon : (0736) 21170, 21884 Faksimile : (0736) 22105</h5>
                <h5>Laman : www.unib.ac.id e-mail : rektorat@unib.ac.id</h5>
            </div>
        </div>
        <hr style="border: 2px solid #000; margin-top: -4px;">
        <h5 style="text-decoration: underline; font-weight: 800; text-underline-offset: 3px;" class="text-center">KEPUTUSAN REKTOR UNIVERSITAS BENGKULU</h5>
        <h5 style="font-weight: 800; margin-top: -5px;" class="text-center">Nomor : {{ $item->nomor_surat }}</h5>
        <div class="text-center mt-3">
            <h5 style="font-weight: 800; margin-bottom: -3px;">T E N T A N G</h5>
            <h5 style="font-weight: 800; margin-bottom: -3px;">PENGANGKATAN DOSEN PENGASUH MATA KULIAH DAN PRAKTIKUM</h5>
            <h5 style="font-weight: 800; margin-bottom: -3px;">SEMESTER GANJIL TAHUN AKADEMIK 2020 / 2021</h5>
            <h5 style="font-weight: 800; margin-bottom: -3px;">FAKULTAS KEDOKTERAN DAN ILMU KESEHATAN</h5>
            <h5 style="font-weight: 800; margin-bottom: -3px;">UNIVERSITAS BENGKULU</h5>
        </div>
        <h5 style="font-weight: 800;" class="text-center mt-4 mb-4">REKTOR UNIVERSITAS BENGKULU</h5>
        <div class="row">
            <div class="col-1">
                <h5 style="font-size: 16px; font-weight: 800;">Menimbang:</h5>
            </div>
            <div class="col-11 pl-5">
                <ol style="list-style-type: lower-alpha;">
                    <li style="text-align: justify; margin-bottom: 5px;">bahwa untuk kelancaran kegiatan perkuliahan semester ganjil tahun akademik 2021/2021 di Universitas Bengkulu dipandang perlu mengangkat dosen pengasuh mata kuliah sesuai dengan keahliannya;</li>
                    <li style="text-align: justify; margin-bottom: 5px;">bahwa dosen pengasuh mata kuliah yang tercantum dalam surat keputusan ini dianggap cakap dan mampu untuk melaksanakan tugas yang diembankan;</li>
                    <li style="text-align: justify; margin-bottom: 5px;">bahwa untuk keperluan sebagaimana tersebut pada butir (a) dan (b) di atas perlu ditetapkan dengan keputusan Rektor;</li>
                </ol>
            </div>
        </div>
        <div class="row">
            <div class="col-1">
                <h5 style="font-size: 16px; font-weight: 800;">Mengingat:</h5>
            </div>
            <div class="col-11 pl-5">
                <ol>
                    <li style="text-align: justify; margin-bottom: 5px;">Undang-Undang RI Nomor 20 Tahun 2003 </li>
                    <li style="text-align: justify; margin-bottom: 5px;">Undang-Undang RI Nomor 14 Tahun 2005 </li>
                    <li style="text-align: justify; margin-bottom: 5px;">Undang-Undang RI Nomor 12 Tahun 2012 </li>
                    <li style="text-align: justify; margin-bottom: 5px;">Undang-Undang RI Nomor 5 Tahun 2014 </li>
                    <li style="text-align: justify; margin-bottom: 5px;">Peraturan Pemerintah RI Nomor 4 Tahun 2014 </li>
                    <li style="text-align: justify; margin-bottom: 5px;">Keputusan Presiden RI Nomor 17 Tahun 1982 </li>
                    <li style="text-align: justify; margin-bottom: 5px;">Peraturan Mendikbud RI Nomor 63 Tahun 2013 </li>
                    <li style="text-align: justify; margin-bottom: 5px;">Peraturan Mendikbud RI Nomor 75 Tahun 2013 </li>
                    <li style="text-align: justify; margin-bottom: 5px;">Peraturan Menristekdikti Nomor 44 Tahun 2015 </li>
                    <li style="text-align: justify; margin-bottom: 5px;">Peraturan Menristekdikti Nomor 412/M/KPT.KP/2017 </li>
                    <li style="text-align: justify; margin-bottom: 5px;">Peraturan Rektor Universitas Bengkulu Nomor 37 Tahun 2016 </li>
                    <li style="text-align: justify; margin-bottom: 5px;">Keputusan Rektor Universitas Bengkulu Nomor 726/UN30/HK/2020 </li>
                </ol>
            </div>
        </div>
        <h5 style="font-weight: 800; margin-bottom: -3px;" class="text-center">M E M U T U S K A N</h5>
        <h5 style="font-size: 16px; font-weight: 800;">Menetapkan</h5>
        <div class="row">
            <div class="col-1">
                <h5 style="font-size: 16px; font-weight: 800;">KESATU</h5>
            </div>
            <div class="col-11 pl-4">
                <ol style="list-style-type: none;">
                    <li style="text-align: justify; margin-bottom: 5px;">: Nama : {{ $item->user->nama }}, NIP : {{ $item->user->dosen->nip }}, Jabatan : {{ $item->user->dosen->jabatan }}, Gol/Rg : {{ $item->user->dosen->golongan }}, Program Studi : {{ $item->user->dosen->prodi }}, Fakultas : {{ $item->user->dosen->fakultas }} ditugaskan untuk  mengasuh pada mata kuliah  sebagai berikut</li>
                </ol>
            </div>
        </div>
        <div class="table">
            <table class="table table-bordered">
                <thead>
                    <tr class="text-center">
                        <td style="border: 1px #000 solid;">No</td>
                        <td style="border: 1px #000 solid;">Kode MK</td>
                        <td style="border: 1px #000 solid;">Mata Kuliah</td>
                        <td style="border: 1px #000 solid;">Smt</td>
                        <td style="border: 1px #000 solid;">SKS</td>
                        <td style="border: 1px #000 solid;">SKS<br>Bagian</td>
                        <td style="border: 1px #000 solid;">Jumlah<br>Jam</td>
                        <td style="border: 1px #000 solid;">JP</td>
                        <td style="border: 1px #000 solid;">Tugas dalam <br>Perkuliahan</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                        $totalSKSBagian = 0;
                        $terbilang = terbilang($totalSKSBagian);
                    @endphp
                    @foreach ($item2 as $item3)
                    @php
                        $totalSKSBagian = $totalSKSBagian + $item3->sks_bagian
                    @endphp
                    <tr class="text-center">
                        <td style="border: 1px #000 solid;">{{ $loop->iteration }}</td>
                        <td style="border: 1px #000 solid;">{{ $item3->mata_kuliah->kode_mata_kuliah }}</td>
                        <td style="border: 1px #000 solid;">{{ $item3->mata_kuliah->nama_mata_kuliah }}</td>
                        <td style="border: 1px #000 solid;">{{ $item3->mata_kuliah->semester }}</td>
                        <td style="border: 1px #000 solid;">{{ $item3->mata_kuliah->sks }}</td>
                        <td style="border: 1px #000 solid;">{{ $item3->sks_bagian }}</td>
                        <td style="border: 1px #000 solid;">{{ $item3->jumlah_jam }}</td>
                        <td style="border: 1px #000 solid;">{{ $item3->jumlah_mahasiswa }}</td>
                        <td style="border: 1px #000 solid;">{{ $item3->tugas_dalam_perkuliahan }}</td>
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr class="text-center">
                        <td colspan="5">Total SKS Mengajar</td>
                        <td colspan="9">{{ $totalSKSBagian }}</td>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="row">
            <div class="col-1">
                <h5 style="font-size: 16px; font-weight: 800;">KEDUA</h5>
            </div>
            <div class="col-11 pl-4">
                <ol style="list-style-type: none;">
                    <li style="text-align: justify; margin-bottom: 5px;">: Keputusan ini mulai berlaku sejak tanggal {{ Carbon\Carbon::parse($item->tanggal_berlaku_dari)->format('d F Y') }} sampai {{ Carbon\Carbon::parse($item->tanggal_berlaku_sampai)->format('d F Y') }}.</li>
                </ol>
            </div>
        </div>
        <div class="div" style="margin-left: 700px;">
            <h5>Ditetapkan di Bengkulu</h5>
            <h5>Pada Tanggal {{ Carbon\Carbon::parse($item->tanggal_surat)->format('d F Y') }}</h5>
            <h5>REKTOR UNIVERSITAS BENGKULU</h5>
            <h5 style="margin-top: 100px;">RIDWAN NURAZI</h5>
            <h5>NIP 196009151989031004</h5>
        </div>
    </div>
</body>
<script>
    window.print()
</script>
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</html>
