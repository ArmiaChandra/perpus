@extends('layouts.app')

@section('content')

<div class="container">

    <div class="alert alert-primary">
        Selamat datang, <b>{{ session('username') }}</b>
    </div>

    <div class="row mt-4">

        {{-- PEMINJAMAN --}}
        <div class="col-md-6">
            <div class="card shadow text-center p-4">

                <h5>📚 Peminjaman Buku</h5>

                <p class="text-muted">
                    Pinjam buku yang tersedia di perpustakaan
                </p>

                <a href="/siswa/peminjaman"
                    class="btn btn-success">
                    Pinjam Buku
                </a>

            </div>
        </div>

        {{-- PENGEMBALIAN --}}
        <div class="col-md-6">
            <div class="card shadow text-center p-4">

                <h5>📦 Pengembalian Buku</h5>

                <p class="text-muted">
                    Kembalikan buku yang sudah dipinjam
                </p>

                <a href="/siswa/pengembalian"
                    class="btn btn-warning">
                    Kembalikan Buku
                </a>

            </div>
        </div>

    </div>

</div>

@endsection