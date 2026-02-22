<?php

namespace App\Http\Controllers;

use App\Models\Buku;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    public function index()
    {
        $buku = Buku::orderBy('judul')->get();
        return view('admin.buku.index', compact('buku'));
    }

    public function create()
    {
        return view('admin.buku.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate(
            [
                'kode_buku' => 'required|unique:bukus,kode_buku',
                'judul'     => 'required',
                'pengarang' => 'required',
                'penerbit'  => 'required',
                'tahun'     => 'required|digits:4',
                'stok'      => 'required|integer|min:0',
            ],
            [
                'kode_buku.unique'   => 'Kode buku sudah digunakan',
                'kode_buku.required' => 'Kode buku wajib diisi',
            ]
        );

        Buku::create($validated);

        return redirect('/admin/buku')
            ->with('success', 'Buku berhasil ditambahkan');
    }

    public function edit($id)
    {
        $buku = Buku::findOrFail($id);
        return view('admin.buku.edit', compact('buku'));
    }

    public function update(Request $request, $id)
    {
        $buku = Buku::findOrFail($id);

        $validated = $request->validate(
            [
                'kode_buku' => 'required|unique:bukus,kode_buku,' . $buku->id,
                'judul'     => 'required',
                'pengarang' => 'required',
                'penerbit'  => 'required',
                'tahun'     => 'required|digits:4',
                'stok'      => 'required|integer|min:0',
            ],
            [
                'kode_buku.unique' => 'Kode buku sudah digunakan',
            ]
        );

        $buku->update($validated);

        return redirect('/admin/buku')
            ->with('success', 'Buku berhasil diupdate');
    }

    public function destroy($id)
    {
        Buku::findOrFail($id)->delete();

        return back()
            ->with('success', 'Buku berhasil dihapus');
    }
}
