@extends('layouts.app')

@section('content')

<div class="card shadow">
    <div class="card-body">

        <h5>📜 Histori Peminjaman Buku</h5>

        <table class="table table-bordered text-center">
            <tr>
                <th>Judul Buku</th>
                <th>Tanggal Pinjam</th>
                <th>Tanggal Kembali</th>
                <th>Status</th>
            </tr>

            @foreach($transaksi as $t)
            <tr>
                <td>{{ $t->buku->judul }}</td>
                <td>{{ $t->tgl_pinjam }}</td>
                <td>{{ $t->tgl_kembali ?? '-' }}</td>
                <td>
                    @if($t->status == 'dipinjam')
                    <span class="badge bg-warning">
                        Dipinjam
                    </span>
                    @else
                    <span class="badge bg-success">
                        Dikembalikan
                    </span>
                    @endif
                </td>
            </tr>
            @endforeach

        </table>

    </div>
</div>

@endsection