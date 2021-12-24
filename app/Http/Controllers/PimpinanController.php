<?php

namespace App\Http\Controllers;

use App\Models\Pimpinan;
use Illuminate\Http\Request;

class PimpinanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Pimpinan::all();

        return view('pages.admin.pimpinan.index', [
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
        $check = Pimpinan::count();

        if ($check < 1) {
            return view('pages.admin.pimpinan.create');
        } else {
            return redirect()->route('data-pimpinan.index');
        }
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
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'semester' => 'required|in:GANJIL,GENAP',
            'tahun_akademik' => 'required|string|max:255',
        ]);

        $check = Pimpinan::count();

        if ($check < 1) {
            Pimpinan::create([
                'nama' => $request->nama,
                'nip' => $request->nip,
                'semester' => $request->semester,
                'tahun_akademik' => $request->tahun_akademik,
            ]);

            return redirect()->route('data-pimpinan.index');
        } else {
            return redirect()->route('data-pimpinan.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $item = Pimpinan::findOrFail($id);

        return view('pages.admin.pimpinan.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item = Pimpinan::findOrFail($id);

        $request->validate([
            'nama' => 'required|string|max:255',
            'nip' => 'required|string|max:255',
            'semester' => 'required|in:GANJIL,GENAP',
            'tahun_akademik' => 'required|string|max:255',
        ]);

        $item->update([
            'nama' => $request->nama,
            'nip' => $request->nip,
            'semester' => $request->semester,
            'tahun_akademik' => $request->tahun_akademik,
        ]);

        return redirect()->route('data-pimpinan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pimpinan  $pimpinan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Pimpinan::findOrFail($id);

        $item->delete();

        return redirect()->route('data-pimpinan.index');
    }
}
