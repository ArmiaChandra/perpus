@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-header bg-warning text-dark">
        Pengembalian Buku
    </div>

    <div class="card-body">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <table class="table table-bordered text-center">
            <tr>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Aksi</th>
            </tr>

            @foreach($transaksi as $t)
            <tr>
                <td>{{ $t->buku->judul }}</td>
                <td>{{ $t->tgl_pinjam }}</td>
                <td>
                    <a href="/siswa/pengembalian/kembali/{{ $t->id }}"
                        class="btn btn-danger btn-sm">
                        Kembalikan
                    </a>
                </td>
            </tr>
            @endforeach

        </table>

    </div>

</div>
<div class="d-flex justify-content-end mt-3">
    <a href="/siswa/dashboard"
        class="btn btn-secondary btn-sm">
        ← Kembali
    </a>
</div>

@endsection