<?php

namespace App\Http\Controllers\Siswa;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Buku;

class PengembalianController extends Controller
{
    public function kembali($id)
    {

        $t = Transaksi::find($id);

        $t->status = 'dikembalikan';
        $t->tgl_kembali = date('Y-m-d');
        $t->save();

        $buku = Buku::find($t->buku_id);
        $buku->stok += 1;
        $buku->save();

        return back()->with('success', 'Berhasil dikembalikan');
    }
}
