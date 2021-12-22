<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Dosen;
use App\Models\SuratKeputusan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class DosenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Dosen::all();

        return view('pages.admin.data-dosen.index', [
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
        return view('pages.admin.data-dosen.create');
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
            'nama' => ['required', 'string', 'max:255'],
            'nip' => ['required', 'string', 'max:255', 'unique:dosens'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'no_telepon' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'golongan' => ['required', 'string', 'max:255'],
            'prodi' => ['required', 'string', 'max:255'],
            'fakultas' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        Dosen::create([
            'user_id' => $user->id,
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telepon' => $request->no_telepon,
            'jabatan' => $request->jabatan,
            'fakultas' => $request->fakultas,
            'golongan' => $request->golongan,
            'prodi' => $request->prodi,
        ]);

        return redirect()->route('data-dosen.index')->with(['success' => 'Berhasil Menambah Data Dosen']);
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
        $item = Dosen::findOrFail($id);

        return view('pages.admin.data-dosen.edit', [
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
            'nama' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'in:L,P'],
            'no_telepon' => ['required', 'string', 'max:255'],
            'jabatan' => ['required', 'string', 'max:255'],
            'golongan' => ['required', 'string', 'max:255'],
            'prodi' => ['required', 'string', 'max:255'],
            'fakultas' => ['required', 'string', 'max:255'],
        ]);

        $item = Dosen::findOrFail($id);
        $user = User::where('id', $item->user_id)->first();

        if ($request->email != $item->user->email) {
            $request->validate([
                'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
            ]);
        }

        if ($request->password) {
            $request->validate([
                'password' => ['required', 'confirmed', Rules\Password::defaults()]
            ]);
        }

        if ($request->nip != $item->nip) {
            $request->validate([
                'nip' => ['required', 'string', 'max:255', 'unique:dosens']
            ]);
        }

        $item->update([
            'nip' => $request->nip,
            'jenis_kelamin' => $request->jenis_kelamin,
            'no_telepon' => $request->no_telepon,
            'jabatan' => $request->jabatan,
            'fakultas' => $request->fakultas,
            'golongan' => $request->golongan,
            'prodi' => $request->prodi,
        ]);

        $user->nama = $request->nama;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->save();

        return redirect()->route('data-dosen.index')->with(['success' => 'Berhasil Mengubah Data Dosen']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Dosen::findOrFail($id);

        $check = SuratKeputusan::where('user_id', $item->user_id)->first();

        if ($check) {
            return redirect()->route('data-dosen.index')->with(['error' => 'Tidak Dapat Menghapus Data Dosen']);
        } else {
            $item->delete();
            return redirect()->route('data-dosen.index')->with(['success' => 'Berhasil Menghapus Data Dosen']);
        }
    }
}
