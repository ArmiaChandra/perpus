<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    public function prosesLogin(Request $request)
    {
        // ADMIN
        $admin = Admin::where('username', $request->username)->first();
        if ($admin && Hash::check($request->password, $admin->password)) {
            session([
                'login' => true,
                'role' => 'admin',
                'id' => $admin->id,
                'username' => $admin->username
            ]);
            return redirect('/admin/dashboard');
        }

        // SISWA
        $siswa = Anggota::where('username', $request->username)->first();
        if ($siswa && Hash::check($request->password, $siswa->password)) {
            session([
                'login' => true,
                'role' => 'siswa',
                'id' => $siswa->id,
                'username' => $siswa->username
            ]);
            return redirect('/siswa/dashboard');
        }

        return back()->with('error', 'Username atau Password salah');
    }

    public function register()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nis' => 'required',
            'nama' => 'required',
            'kelas' => 'required',
            'jurusan' => 'required',
            'username' => 'required|unique:anggotas',
            'password' => 'required'
        ]);

        \App\Models\Anggota::create([
            'nis' => $request->nis,
            'nama' => $request->nama,
            'kelas' => $request->kelas,
            'jurusan' => $request->jurusan,
            'username' => $request->username,
            'password' => bcrypt($request->password),
        ]);

        return redirect('/login')->with('success', 'Register berhasil!');
    }

    public function logout()
    {
        session()->flush();
        return redirect('/login');
    }
}
