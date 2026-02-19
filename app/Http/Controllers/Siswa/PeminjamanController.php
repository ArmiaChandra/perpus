<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Transaksi;
use App\Models\Peminjaman;

class PeminjamanController extends Controller
{
    public function __construct()
    {
        if (!session('login') || session('role') != 'siswa') {
            redirect('/login')->send();
        }
    }

    public function index()
    {
        $buku = Buku::all();
        return view('siswa.peminjaman', compact('buku'));
    }

    public function pinjam($id)
    {
        $buku = Buku::find($id);

        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok habis');
        }

        Transaksi::create([
            'anggota_id' => session('id'),
            'buku_id' => $id,
            'tgl_pinjam' => date('Y-m-d'),
            'status' => 'dipinjam'
        ]);

        $buku->stok -= 1;
        $buku->save();

        return back()->with('success', 'Buku berhasil dipinjam');
    }
}
