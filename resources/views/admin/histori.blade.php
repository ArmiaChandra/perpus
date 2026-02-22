@extends('layouts.app')

@section('content')

<div class="container">

    {{-- FORM TAMBAH --}}
    <div class="card shadow mb-4">
        <div class="card-header">
            <h5 class="mb-0">Tambah Transaksi</h5>
        </div>
        <div class="card-body">

            <form action="/admin/transaksi/store" method="POST" class="mb-4">
                @csrf

                <div class="row">

                    <div class="col-md-5">
                        <select name="anggota_id" class="form-control" required>
                            <option value="">Pilih Anggota</option>
                            @foreach($anggota as $a)
                            <option value="{{ $a->id }}">{{ $a->nama }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-5">
                        <select name="buku_id" class="form-control" required>
                            <option value="">Pilih Buku</option>
                            @foreach($buku as $b)
                            <option value="{{ $b->id }}">{{ $b->judul }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-2">
                        <button class="btn btn-primary w-100">
                            Pinjam
                        </button>
                    </div>

                </div>
            </form>

        </div>
    </div>

    {{-- TABEL --}}
    <div class="card shadow">
        <div class="card-header">
            <h5 class="mb-0">List Transaksi</h5>
        </div>

        <div class="card-body">

            <table class="table table-bordered text-center">

                <tr>
                    <th>Anggota</th>
                    <th>Buku</th>
                    <th>Tgl Pinjam</th>
                    <th>Tgl Kembali</th>
                    <th>Status</th>
                    <th width="200px">Aksi</th>
                </tr>

                @foreach($transaksi as $t)

                <form action="/admin/transaksi/update/{{ $t->id }}" method="POST">
                    @csrf

                    <tr>

                        <td>
                            <select name="anggota_id" class="form-control">
                                @foreach($anggota as $a)
                                <option value="{{ $a->id }}"
                                    {{ $t->anggota_id == $a->id ? 'selected' : '' }}>
                                    {{ $a->nama }}
                                </option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <select name="buku_id" class="form-control">
                                @foreach($buku as $b)
                                <option value="{{ $b->id }}"
                                    {{ $t->buku_id == $b->id ? 'selected' : '' }}>
                                    {{ $b->judul }}
                                </option>
                                @endforeach
                            </select>
                        </td>

                        <td>
                            <input type="date" name="tgl_pinjam"
                                value="{{ $t->tgl_pinjam }}"
                                class="form-control">
                        </td>

                        <td>
                            <input type="date" name="tgl_kembali"
                                value="{{ $t->tgl_kembali }}"
                                class="form-control">
                        </td>

                        <td>
                            <select name="status" class="form-control">
                                <option value="dipinjam"
                                    {{ $t->status=='dipinjam'?'selected':'' }}>
                                    Dipinjam
                                </option>
                                <option value="dikembalikan"
                                    {{ $t->status=='dikembalikan'?'selected':'' }}>
                                    Dikembalikan
                                </option>
                            </select>
                        </td>

                        <td>

                            <a href="/admin/transaksi/delete/{{ $t->id }}"
                                class="btn btn-danger btn-sm">
                                Hapus
                            </a>

                        </td>

                    </tr>

                </form>
                @endforeach

            </table>
            <div class="d-flex justify-content-end mt-3">
                <a href="/admin/dashboard"
                    class="btn btn-secondary btn-sm">
                    ← Kembali
                </a>
            </div>
        </div>
    </div>

</div>

@endsection