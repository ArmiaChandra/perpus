<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Buku;
use App\Models\Transaksi;

class SiswaController extends Controller
{
    public function dashboard()
    {
        $buku = Buku::all();
        return view('siswa.dashboard', compact('buku'));
    }

    public function buku()
    {
        $buku = Buku::all();
        return view('siswa.buku', compact('buku'));
    }

    public function pinjam(Request $request)
    {
        $buku = Buku::find($request->buku_id);

        if ($buku->stok <= 0) {
            return redirect()->back()->with('error', 'Stok buku habis!');
        }

        Transaksi::create([
            'anggota_id' => 1,
            'buku_id' => $request->buku_id,
            'tgl_pinjam' => date('Y-m-d'),
            'status' => 'dipinjam'
        ]);

        $buku->stok -= 1;
        $buku->save();

        return redirect()->back()->with('success', 'Buku berhasil dipinjam!');
    }

    public function peminjaman()
    {
        $buku = Buku::all();
        return view('siswa.peminjaman', compact('buku'));
    }

    public function pengembalian()
    {
        $anggota_id = session('id');

        $transaksi = Transaksi::with('buku')
            ->where('anggota_id', $anggota_id)
            ->where('status', 'dipinjam')
            ->get();

        return view('siswa.pengembalian', compact('transaksi'));
    }

    public function kembali($id)
    {
        $transaksi = Transaksi::find($id);

        $buku = Buku::find($transaksi->buku_id);
        $buku->stok += 1;
        $buku->save();

        $transaksi->tgl_kembali = date('Y-m-d');
        $transaksi->status = 'dikembalikan';
        $transaksi->save();

        return back()->with('success', 'Buku berhasil dikembalikan');
    }

}
