<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\MataKuliah;
use App\Models\SuratKeputusan;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $dosen = Dosen::count();
        $matkul = MataKuliah::count();
        $skblm = SuratKeputusan::where('status', 'Belum Diverifikasi')->count();
        $sksdh = SuratKeputusan::where('status', 'Sudah Diverifikasi')->count();

        return view('pages.admin.dashboard', [
            'dosen' => $dosen, 'matkul' => $matkul, 'skblm' => $skblm, 'sksdh' => $sksdh
        ]);
    }
}
