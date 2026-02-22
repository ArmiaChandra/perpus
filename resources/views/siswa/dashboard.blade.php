@extends('layouts.app')

@section('content')
<div class="container py-5">

    <div class="text-center mb-5">
        <h4 class="fw-bold">Dashboard Siswa</h4>
        <p class="text-muted">
            Selamat datang, <b>{{ session('username') }}</b>
        </p>
    </div>

    <div class="row justify-content-center">

        <div class="col-md-5 mb-4">
            <div class="card shadow-sm border-0 bg-success bg-opacity-10">
                <div class="card-body text-center py-5">

                    <div style="font-size:40px;" class="mb-3 text-success">
                        <i class="bi bi-book"></i>
                    </div>

                    <h5 class="text-success mb-2">
                        Peminjaman Buku
                    </h5>

                    <p class="text-muted">
                        Pinjam buku yang tersedia di perpustakaan
                    </p>

                    <a href="/siswa/peminjaman" class="btn btn-success w-100">
                        Pinjam Buku
                    </a>

                </div>
            </div>
        </div>

        <div class="col-md-5 mb-4">
            <div class="card shadow-sm border-0 bg-warning bg-opacity-10">
                <div class="card-body text-center py-5">

                    <div style="font-size:40px;" class="mb-3 text-warning">
                        <i class="bi bi-box-arrow-in-left"></i>
                    </div>

                    <h5 class="text-warning mb-2">
                        Pengembalian Buku
                    </h5>

                    <p class="text-muted">
                        Kembalikan buku yang sudah dipinjam
                    </p>

                    <a href="/siswa/pengembalian" class="btn btn-warning w-100">
                        Kembalikan Buku
                    </a>

                </div>
            </div>
        </div>

    </div>

</div>
@endsection