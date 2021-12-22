<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\MataKuliah;
use App\Models\SuratKeputusanMatkul;
use Illuminate\Http\Request;

class MataKuliahController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = MataKuliah::all();

        return view('pages.admin.mata-kuliah.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('pages.admin.mata-kuliah.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'kode_mata_kuliah' => ['required', 'string', 'max:255', 'unique:mata_kuliahs'],
            'nama_mata_kuliah' => ['required', 'string', 'max:255'],
            'sks' => ['required', 'string', 'max:255'],
            'semester' => ['required', 'string', 'max:255'],
        ]);

        MataKuliah::create([
            'kode_mata_kuliah' => $request->kode_mata_kuliah,
            'nama_mata_kuliah' => $request->nama_mata_kuliah,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return redirect()->route('mata-kuliah.index')->with(['success' => 'Berhasil Menambah Data Mata Kuliah']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = MataKuliah::findOrFail($id);

        return view('pages.admin.mata-kuliah.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_mata_kuliah' => ['required', 'string', 'max:255'],
            'sks' => ['required', 'string', 'max:255'],
            'semester' => ['required', 'string', 'max:255'],
        ]);

        $item = MataKuliah::findOrFail($id);

        if ($request->kode_mata_kuliah != $item->kode_mata_kuliah) {
            $request->validate([
                'nama_mata_kuliah' => ['required', 'string', 'max:255', 'unique:mata_kuliahs']
            ]);
        }

        $item->update([
            'kode_mata_kuliah' => $request->kode_mata_kuliah,
            'nama_mata_kuliah' => $request->nama_mata_kuliah,
            'sks' => $request->sks,
            'semester' => $request->semester,
        ]);

        return redirect()->route('mata-kuliah.index')->with(['success' => 'Berhasil Mengubah Data Mata Kuliah']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = MataKuliah::findOrFail($id);

        $check = SuratKeputusanMatkul::where('mata_kuliah_id', $id)->first();

        if ($check) {
            return redirect()->route('mata-kuliah.index')->with(['error' => 'Tidak Dapat Menghapus Data Mata Kuliah']);
        } else {
            $item->delete();
            return redirect()->route('mata-kuliah.index')->with(['success' => 'Berhasil Menghapus Data Mata Kuliah']);
        }
    }
}
