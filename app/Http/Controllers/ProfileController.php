<?php

namespace App\Http\Controllers;

use App\Models\Dosen;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{
    public function index()
    {
        $item = User::findOrFail(Auth::user()->id);

        return view('pages.profile', [
            'item' => $item
        ]);
    }

    public function update(Request $request)
    {
        if (Auth::user()->role === 'DOSEN') {
            $request->validate([
                'nama' => ['required', 'string', 'max:255'],
                'jenis_kelamin' => ['required', 'in:L,P'],
                'no_telepon' => ['required', 'string', 'max:255'],
                'jabatan' => ['required', 'string', 'max:255'],
                'golongan' => ['required', 'string', 'max:255'],
                'prodi' => ['required', 'string', 'max:255'],
                'fakultas' => ['required', 'string', 'max:255'],
            ]);

            $item = Dosen::where('user_id', Auth::user()->id)->first();
            $user = User::findOrFail(Auth::user()->id);

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
                $user->password = $request->password;
            }
            $user->save();

            return redirect()->route('profile.index');
        }elseif (Auth::user()->role === 'ADMIN') {
            $request->validate([
                'nama' => ['required', 'string', 'max:255']
            ]);

            $user = User::findOrFail(Auth::user()->id);

            if ($request->email != $user->email) {
                $request->validate([
                    'email' => ['required', 'string', 'email', 'max:255', 'unique:users']
                ]);
            }

            if ($request->password) {
                $request->validate([
                    'password' => ['required', 'confirmed', Rules\Password::defaults()]
                ]);
            }

            $user->nama = $request->nama;
            $user->email = $request->email;
            if ($request->password) {
                $user->password = Hash::make($request->password);
            }
            $user->save();

            return redirect()->route('profile.index');
        }

    }
}
