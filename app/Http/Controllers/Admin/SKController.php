<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratKeputusan;
use App\Models\SuratKeputusanMatkul;
use Illuminate\Http\Request;

class SKController extends Controller
{
    public function index()
    {
        $items = SuratKeputusan::where('status', 'Belum Diverifikasi')->where('status_verifikasi', 1)->get();
        $items2 = SuratKeputusan::where('status', 'Sudah Diverifikasi')->orderBy('created_at', 'DESC')->get();

        return view('pages.admin.sk.index', [
            'items' => $items, 'items2' => $items2
        ]);
    }

    public function show($id)
    {
        $item = SuratKeputusan::findOrFail($id);

        $skmatkul = SuratKeputusanMatkul::where('surat_keputusan_id', $id)->get();

        return view('pages.admin.sk.show', [
            'item' => $item, 'skmatkul' => $skmatkul
        ]);
    }

    public function verifikasi(Request $request, $id)
    {
        $item = SuratKeputusan::findOrFail($id);

        $request->validate([
            'nomor_surat' => 'required|string|max:255',
            'tanggal_berlaku_dari' => 'required|date',
            'tanggal_berlaku_sampai' => 'required|date',
            'tanggal_surat' => 'required|date',
        ]);

        $item->update([
            'nomor_surat' => $request->nomor_surat,
            'tanggal_berlaku_dari' => $request->tanggal_berlaku_dari,
            'tanggal_berlaku_sampai' => $request->tanggal_berlaku_sampai,
            'tanggal_surat' => $request->tanggal_surat,
            'status' => 'Sudah Diverifikasi'
        ]);

        return redirect()->route('sk.index')->with(['success' => 'Berhasil Memverifikasi Surat Keputusan']);
    }
}
