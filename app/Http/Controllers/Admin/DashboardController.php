<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\SuratKeputusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $dosen = Dosen::count();
        $matkul = MataKuliah::count();
        $skblm = SuratKeputusan::where('status', 'Belum Diverifikasi')->count();
        $sksdh = SuratKeputusan::where('status', 'Sudah Diverifikasi')->count();

        $skBelum = SuratKeputusan::where('user_id', Auth::user()->id)->where('status', 'Belum Diverifikasi')->count();
        $skSudah = SuratKeputusan::where('user_id', Auth::user()->id)->where('status', 'Sudah Diverifikasi')->count();

        if (Auth::user()->role == 'ADMIN') {
            return view('pages.admin.dashboard', [
                'dosen' => $dosen, 'matkul' => $matkul, 'skblm' => $skblm, 'sksdh' => $sksdh
            ]);
        }else {
            return view('pages.admin.dashboard', [
                'skBelum' => $skBelum, 'skSudah' => $skSudah
            ]);
        }
    }
}
