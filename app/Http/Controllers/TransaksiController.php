<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Anggota;
use App\Models\Buku;

class TransaksiController extends Controller
{
    // 🔵 READ
    public function index()
    {
        $transaksi = Transaksi::with('anggota', 'buku')->get();
        $anggota   = Anggota::all();
        $buku      = Buku::all();

        return view('admin.histori', compact('transaksi', 'anggota', 'buku'));
    }

    // 🟢 CREATE (PINJAM)
    public function store(Request $request)
    {
        $buku = Buku::find($request->buku_id);

        if ($buku->stok <= 0) {
            return back()->with('error', 'Stok buku habis!');
        }

        Transaksi::create([
            'anggota_id' => $request->anggota_id,
            'buku_id'    => $request->buku_id,
            'tgl_pinjam' => date('Y-m-d'),
            'status'     => 'dipinjam'
        ]);

        // ⬇️ Kurangi stok
        $buku->decrement('stok');

        return back()->with('success', 'Transaksi berhasil ditambahkan');
    }

    // 🟡 EDIT (SEKARANG = KEMBALIKAN)
    public function edit($id)
    {
        $t = Transaksi::find($id);

        if ($t->status == 'dipinjam') {

            $t->update([
                'status'      => 'dikembalikan',
                'tgl_kembali' => date('Y-m-d')
            ]);

            // ⬆️ Balikin stok
            Buku::find($t->buku_id)->increment('stok');
        }

        return back()->with('success', 'Buku berhasil dikembalikan');
    }

    // 🔴 DELETE
    public function destroy($id)
    {
        $t = Transaksi::find($id);

        // Kalau masih dipinjam lalu dihapus → balikin stok
        if ($t->status == 'dipinjam') {
            Buku::find($t->buku_id)->increment('stok');
        }

        $t->delete();

        return back()->with('success', 'Transaksi berhasil dihapus');
    }
}
