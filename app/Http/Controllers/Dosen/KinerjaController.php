<?php

namespace App\Http\Controllers\Dosen;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use App\Models\Pimpinan;
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

        $request->validate([
            'mata_kuliah_id' => 'required',
            'tugas_dalam_perkuliahan' => 'required'
        ]);

        if ($request->tugas_dalam_perkuliahan == 'Narasumber Kuliah' || $request->tugas_dalam_perkuliahan == 'Narasumber Pleno' || $request->tugas_dalam_perkuliahan == 'Tutor' || $request->tugas_dalam_perkuliahan == 'Pembimbing Case Report' || $request->tugas_dalam_perkuliahan == 'Pembimbing Tutorial') {
            $request->validate([
                'jumlah_jam' => 'required|numeric',
                'jumlah_mahasiswa' => 'required|numeric'
            ]);
        }elseif ($request->tugas_dalam_perkuliahan == 'Fasilitator' || $request->tugas_dalam_perkuliahan == 'Tutor KKD') {
            $request->validate([
                'jumlah_jam' => 'required|numeric'
            ]);
        }elseif ($request->tugas_dalam_perkuliahan == 'Penguji OSCE') {
            $request->validate([
                'jumlah_mahasiswa' => 'required|numeric'
            ]);
        }

        if ($request->tugas_dalam_perkuliahan == 'Pembimbing Case Report') { // 1.7
            if ($jmlMahasiswa <= 5) {
                $jmlJamFix = $jmlJam * 0.0625;
            }elseif ($jmlMahasiswa >= 6 && $jmlMahasiswa <= 10) {
                $jmlJamFix = $jmlJam * 0.09375;
            }elseif ($jmlMahasiswa >= 11 && $jmlMahasiswa <= 15) {
                $jmlJamFix = $jmlJam * 0.125;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Pembimbing Case Report Salah']);
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Narasumber Kuliah' || $request->tugas_dalam_perkuliahan == 'Narasumber Pleno') { // 1.1 dan 1.3
            if ($jmlMahasiswa <= 40) {
                $jmlJamFix = $jmlJam * 0.0625;
            }elseif ($jmlMahasiswa >= 41 && $jmlMahasiswa <= 80) {
                $jmlJamFix = $jmlJam * 0.09375;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Narasumber Salah']);
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Pembimbing Tutorial') { // 1.8
            if ($jmlMahasiswa <= 5) {
                $jmlJamFix = $jmlJam * 0.03125;
            }elseif ($jmlMahasiswa >= 6 && $jmlMahasiswa <= 10) {
                $jmlJamFix = $jmlJam * 0.0469;
            }elseif ($jmlMahasiswa >= 11 && $jmlMahasiswa <= 15) {
                $jmlJamFix = $jmlJam * 0.0625;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Pembimbing Tutorial Salah']);
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Tutor') { // 1.4
            if ($jmlMahasiswa <= 25) {
                $jmlJamFix = $jmlJam * 0.03125;
            }elseif ($jmlMahasiswa >= 26 && $jmlMahasiswa <= 50) {
                $jmlJamFix = $jmlJam * 0.0469;
            }elseif ($jmlMahasiswa >= 51 && $jmlMahasiswa <= 75) {
                $jmlJamFix = $jmlJam * 0.0625;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Tutor Salah']);
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Fasilitator') { //1.2
            if ($jmlJam != NULL) {
                $jmlJamFix = $jmlJam * 0.0625;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Fasilitator Salah']);
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Tutor KKD') { //1.5
            if ($jmlJam != NULL) {
                $jmlJamFix = $jmlJam * 0.03125;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Tutor KKD Salah']);
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Penguji OSCE') { //1.6
            if ($jmlMahasiswa <= 4) {
                $jmlJamFix = 0.25;
            }elseif ($jmlMahasiswa >= 5 && $jmlMahasiswa <= 8) {
                $jmlJamFix = 0.50;
            }elseif ($jmlMahasiswa >= 9 && $jmlMahasiswa <= 12) {
                $jmlJamFix = 0.75;
            }elseif ($jmlMahasiswa >= 13 && $jmlMahasiswa <= 16) {
                $jmlJamFix = 1.00;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Penguji OSCE Salah']);
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

        return redirect()->route('kinerja.show-detail', $request->id)->with(['success' => 'Berhasil Menambah Mata Kuliah']);
    }

    public function edit_matkul($id)
    {
        $item = SuratKeputusanMatkul::findOrFail($id);
        $matkul = MataKuliah::all();

        return view('pages.dosen.kinerja.edit', [
            'item' => $item, 'matkul' => $matkul
        ]);
    }

    public function update_matkul(Request $request, $id)
    {
        $item = SuratKeputusanMatkul::findOrFail($id);

        $idd = $item->surat_keputusan_id;

        $jmlJam = $request->jumlah_jam;
        $jmlMahasiswa = $request->jumlah_mahasiswa;
        $jmlJamFix = null;

        if ($request->tugas_dalam_perkuliahan == 'Narasumber Kuliah' || $request->tugas_dalam_perkuliahan == 'Narasumber Pleno' || $request->tugas_dalam_perkuliahan == 'Tutor' || $request->tugas_dalam_perkuliahan == 'Pembimbing Case Report' || $request->tugas_dalam_perkuliahan == 'Pembimbing Tutorial') {
            $request->validate([
                'jumlah_jam' => 'required|numeric',
                'jumlah_mahasiswa' => 'required|numeric'
            ]);
        }elseif ($request->tugas_dalam_perkuliahan == 'Fasilitator' || $request->tugas_dalam_perkuliahan == 'Tutor KKD') {
            $request->validate([
                'jumlah_jam' => 'required|numeric'
            ]);
        }elseif ($request->tugas_dalam_perkuliahan == 'Penguji OSCE') {
            $request->validate([
                'jumlah_mahasiswa' => 'required|numeric'
            ]);
        }

        if ($request->tugas_dalam_perkuliahan == 'Pembimbing Case Report') { // 1.7
            if ($jmlMahasiswa <= 5) {
                $jmlJamFix = $jmlJam * 0.0625;
            }elseif ($jmlMahasiswa >= 6 && $jmlMahasiswa <= 10) {
                $jmlJamFix = $jmlJam * 0.09375;
            }elseif ($jmlMahasiswa >= 11 && $jmlMahasiswa <= 15) {
                $jmlJamFix = $jmlJam * 0.125;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Pembimbing Case Report Salah']);
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Narasumber Kuliah' || $request->tugas_dalam_perkuliahan == 'Narasumber Pleno') { // 1.1 dan 1.3
            if ($jmlMahasiswa <= 40) {
                $jmlJamFix = $jmlJam * 0.0625;
            }elseif ($jmlMahasiswa >= 41 && $jmlMahasiswa <= 80) {
                $jmlJamFix = $jmlJam * 0.09375;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Narasumber Salah']);
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Pembimbing Tutorial') { // 1.8
            if ($jmlMahasiswa <= 5) {
                $jmlJamFix = $jmlJam * 0.03125;
            }elseif ($jmlMahasiswa >= 6 && $jmlMahasiswa <= 10) {
                $jmlJamFix = $jmlJam * 0.0469;
            }elseif ($jmlMahasiswa >= 11 && $jmlMahasiswa <= 15) {
                $jmlJamFix = $jmlJam * 0.0625;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Pembimbing Tutorial Salah']);
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Tutor') { // 1.4
            if ($jmlMahasiswa <= 25) {
                $jmlJamFix = $jmlJam * 0.03125;
            }elseif ($jmlMahasiswa >= 26 && $jmlMahasiswa <= 50) {
                $jmlJamFix = $jmlJam * 0.0469;
            }elseif ($jmlMahasiswa >= 51 && $jmlMahasiswa <= 75) {
                $jmlJamFix = $jmlJam * 0.0625;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Tutor Salah']);
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Fasilitator') { //1.2
            if ($jmlJam != NULL) {
                $jmlJamFix = $jmlJam * 0.0625;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Fasilitator Salah']);
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Tutor KKD') { //1.5
            if ($jmlJam != NULL) {
                $jmlJamFix = $jmlJam * 0.03125;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Tutor KKD Salah']);
            }
        }elseif ($request->tugas_dalam_perkuliahan == 'Penguji OSCE') { //1.6
            if ($jmlMahasiswa <= 4) {
                $jmlJamFix = 0.25;
            }elseif ($jmlMahasiswa >= 5 && $jmlMahasiswa <= 8) {
                $jmlJamFix = 0.50;
            }elseif ($jmlMahasiswa >= 9 && $jmlMahasiswa <= 12) {
                $jmlJamFix = 0.75;
            }elseif ($jmlMahasiswa >= 13 && $jmlMahasiswa <= 16) {
                $jmlJamFix = 1.00;
            }else {
                return redirect()->back()->withInput()->with(['error' => 'Format Pengisian Penguji OSCE Salah']);
            }
        }

        $item->update([
            'mata_kuliah_id' => $request->mata_kuliah_id,
            'jumlah_jam' => $request->jumlah_jam,
            'jumlah_mahasiswa' => $request->jumlah_mahasiswa,
            'tugas_dalam_perkuliahan' => $request->tugas_dalam_perkuliahan,
            'sks_bagian' => $jmlJamFix
        ]);

        return redirect()->route('kinerja.show-detail', $idd)->with(['success' => 'Berhasil Mengubah Mata Kuliah']);
    }

    public function destroy_matkul($id)
    {
        $item = SuratKeputusanMatkul::findOrFail($id);
        $idd = $item->surat_keputusan_id;

        $item->delete();

        return redirect()->route('kinerja.show-detail', $idd)->with(['success' => 'Berhasil Menghapus Mata Kuliah']);
    }

    public function destroy($id)
    {
        $item = SuratKeputusan::findOrFail($id);

        SuratKeputusanMatkul::where('surat_keputusan_id', $id)->delete();

        $item->delete();

        return redirect()->route('kinerja.index')->with(['success' => 'Berhasil Menghapus Data Kinerja']);
    }

    public function cetak($id){
        $item = SuratKeputusan::findOrFail($id);
        $item2 = SuratKeputusanMatkul::where('surat_keputusan_id', $id)->get();
        $pimpinan = Pimpinan::first();

        return view('pages.pdf.sk', [
            'item' => $item, 'item2' => $item2, 'pimpinan' => $pimpinan
        ]);
    }

    public function selesai($id)
    {
        $item = SuratKeputusan::findOrFail($id);

        $check = SuratKeputusanMatkul::where('surat_keputusan_id', $id)->first();

        if ($check) {
            $item->status_verifikasi = 1;
            $item->save();

            return redirect()->route('kinerja.index')->with(['success' => 'Selesai Pengisian Mata Kuliah']);
        } else {
            return redirect()->route('kinerja.index')->with(['error' => 'Silahkan Masukkan Mata Kuliah Terlebih dahulu']);
        }
    }
}
