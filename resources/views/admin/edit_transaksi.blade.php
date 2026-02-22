@extends('layouts.app')

@section('content')

<div class="container">

    <div class="card shadow">
        <div class="card-header">
            <h5>Edit Transaksi</h5>
        </div>

        <div class="card-body">

            <form action="/admin/transaksi/{{ $transaksi->id }}"
                method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Anggota</label>
                    <select name="anggota_id"
                        class="form-control">
                        @foreach($anggota as $a)
                        <option value="{{ $a->id }}"
                            @if($transaksi->anggota_id == $a->id) selected @endif>
                            {{ $a->nama }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Buku</label>
                    <select name="buku_id"
                        class="form-control">
                        @foreach($buku as $b)
                        <option value="{{ $b->id }}"
                            @if($transaksi->buku_id == $b->id) selected @endif>
                            {{ $b->judul }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <label>Tgl Pinjam</label>
                    <input type="date"
                        name="tgl_pinjam"
                        value="{{ $transaksi->tgl_pinjam }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Tgl Kembali</label>
                    <input type="date"
                        name="tgl_kembali"
                        value="{{ $transaksi->tgl_kembali }}"
                        class="form-control">
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status"
                        class="form-control">
                        <option value="dipinjam"
                            @if($transaksi->status == 'dipinjam') selected @endif>
                            Dipinjam
                        </option>

                        <option value="dikembalikan"
                            @if($transaksi->status == 'dikembalikan') selected @endif>
                            Dikembalikan
                        </option>
                    </select>
                </div>

                <button class="btn btn-primary">
                    Update
                </button>

                <a href="/admin/transaksi"
                    class="btn btn-secondary">
                    Kembali
                </a>

            </form>

        </div>
    </div>

</div>

@endsection