@extends('layouts.app')

@section('content')

<div class="container">

    <h4 class="mb-3">📚 Daftar Buku</h4>

    <table class="table table-bordered text-center">
        <tr>
            <th>Judul Buku</th>
            <th>Stok</th>
            <th>Aksi</th>
        </tr>

        @foreach($buku as $b)
        <tr>
            <td>{{ $b->judul }}</td>
            <td>{{ $b->stok }}</td>

            <td>
                @if($b->stok > 0)
                <form method="POST" action="{{ route('siswa.pinjam') }}">
                    @csrf
                    <input type="hidden" name="buku_id" value="{{ $b->id }}">

                    <button class="btn btn-success btn-sm">
                        Pinjam
                    </button>
                </form>
                @else
                <span class="text-danger">
                    Habis
                </span>
                @endif
            </td>

        </tr>
        @endforeach

    </table>

    <div class="d-flex justify-content-end mt-3">
        <a href="/siswa/dashboard"
            class="btn btn-secondary btn-sm">
            ← Kembali
        </a>
    </div>

</div>

@endsection