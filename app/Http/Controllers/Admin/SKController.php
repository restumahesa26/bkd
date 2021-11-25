<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SuratKeputusan;
use Illuminate\Http\Request;

class SKController extends Controller
{
    public function index()
    {
        $items = SuratKeputusan::where('status', 'Belum Diverifikasi')->get();
        $items2 = SuratKeputusan::where('status', 'Sudah Diverifikasi')->get();

        return view('pages.admin.sk.index', [
            'items' => $items, 'items2' => $items2
        ]);
    }

    public function show($id)
    {
        $item = SuratKeputusan::findOrFail($id);

        return view('pages.admin.sk.show', [
            'item' => $item
        ]);
    }

    public function verifikasi(Request $request, $id)
    {
        $item = SuratKeputusan::findOrFail($id);

        $item->update([
            'nomor_surat' => $request->nomor_surat,
            'tanggal_berlaku_dari' => $request->tanggal_berlaku_dari,
            'tanggal_berlaku_sampai' => $request->tanggal_berlaku_sampai,
            'tanggal_surat' => $request->tanggal_surat,
            'status' => 'Sudah Diverifikasi'
        ]);

        return redirect()->route('sk.index');
    }
}
