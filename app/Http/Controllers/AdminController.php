<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class AdminController extends Controller
{
    public function dashboard()
    {
        return view('admin.dashboard');
    }

    public function histori()
    {
        $transaksi = Transaksi::with('anggota', 'buku')
            ->latest()
            ->get();

        return view('admin.histori', compact('transaksi'));
    }
}
