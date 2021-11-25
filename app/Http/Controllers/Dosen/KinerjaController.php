<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use App\Models\SuratKeputusan;
use App\Models\SuratKeputusanMatkul;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class KinerjaController extends Controller
{
    public function index()
    {
        $items = SuratKeputusan::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->get();

        return view('pages.dosen.kinerja.index', [
            'items' => $items
        ]);
    }

    public function create_kinerja()
    {
        SuratKeputusan::create([
            'user_id' => Auth::user()->id
        ]);

        return redirect()->route('kinerja.index');
    }

    public function show_matkul($id)
    {
        $sk = SuratKeputusan::findOrFail($id);
        $matkulSK = SuratKeputusanMatkul::where('surat_keputusan_id', $id)->get();

        return view('pages.dosen.kinerja.show', [
            'sk' => $sk, 'matkulSK' => $matkulSK
        ]);
    }

    public function tambah_matkul($id)
    {
        $matkul = MataKuliah::all();

        return view('pages.dosen.kinerja.create', [
            'matkul' => $matkul, 'id' => $id
        ]);
    }

    public function store_matkul(Request $request)
    {
        $jmlJam = $request->jumlah_jam;
        $jmlMahasiswa = $request->jumlah_mahasiswa;
        $jmlJamFix = null;

        if ($request->tugas_dalam_perkuliahan == 'Fasilitator') {
            if ($jmlMahasiswa <= 5) {
                $jmlJamFix = $jmlJam * 0.0625;
            }elseif ($jmlMahasiswa >= 6 && $jmlMahasiswa <= 10) {
                $jmlJamFix = $jmlJam * 0.09375;
            }elseif ($jmlMahasiswa >= 11 && $jmlMahasiswa <= 15) {
                $jmlJamFix = $jmlJam * 0.125;
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Narasumber') {
            if ($jmlMahasiswa <= 40) {
                $jmlJamFix = $jmlJam * 0.0625;
            }elseif ($jmlMahasiswa >= 41 && $jmlMahasiswa <= 80) {
                $jmlJamFix = $jmlJam * 0.09375;
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Tutor KKD') {
            if ($jmlMahasiswa <= 5) {
                $jmlJamFix = $jmlJam * 0.03125;
            }elseif ($jmlMahasiswa >= 6 && $jmlMahasiswa <= 10) {
                $jmlJamFix = $jmlJam * 0.0469;
            }elseif ($jmlMahasiswa >= 11 && $jmlMahasiswa <= 15) {
                $jmlJamFix = $jmlJam * 0.0625;
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Pembimbing Praktikum') {
            if ($jmlMahasiswa <= 25) {
                $jmlJamFix = $jmlJam * 0.03125;
            }elseif ($jmlMahasiswa >= 26 && $jmlMahasiswa <= 50) {
                $jmlJamFix = $jmlJam * 0.0469;
            }elseif ($jmlMahasiswa >= 51 && $jmlMahasiswa <= 75) {
                $jmlJamFix = $jmlJam * 0.0625;
            }
        }

        SuratKeputusanMatkul::create([
            'surat_keputusan_id' => $request->id,
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'jumlah_jam' => $request->jumlah_jam,
            'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
            'tugas_dalam_perkuliahan' => $request->tugas_dalam_perkuliahan,
            'sks_bagian' => $jmlJamFix
        ]);

        return redirect()->route('kinerja.show-detail', $request->id);
    }

    public function destroy($id)
    {
        $item = SuratKeputusan::findOrFail($id);

        $item->delete();

        return redirect()->route('kinerja.index');
    }

    public function cetak($id){
        $item = SuratKeputusan::findOrFail($id);
        $item2 = SuratKeputusanMatkul::where('surat_keputusan_id', $id)->get();

        return view('pages.pdf.sk', [
            'item' => $item, 'item2' => $item2
        ]);
    }
}
