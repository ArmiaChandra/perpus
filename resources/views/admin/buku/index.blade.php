<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Data Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow border-0">

            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5 class="mb-0">📚 Data Buku</h5>

                <a href="/admin/buku/create"
                    class="btn btn-light btn-sm">
                    + Tambah Buku
                </a>
            </div>

            <div class="card-body">

                <table class="table table-bordered table-hover text-center align-middle">

                    <thead class="table-secondary">
                        <tr>
                            <th>Kode</th>
                            <th>Judul</th>
                            <th>Pengarang</th>
                            <th>Penerbit</th>
                            <th>Tahun</th>
                            <th>Stok</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($buku as $b)
                        <tr>

                            <td>{{ $b->kode_buku }}</td>
                            <td>{{ $b->judul }}</td>
                            <td>{{ $b->pengarang }}</td>
                            <td>{{ $b->penerbit }}</td>
                            <td>{{ $b->tahun }}</td>
                            <td>{{ $b->stok }}</td>

                            <td>

                                <a href="/admin/buku/{{ $b->id }}/edit"
                                    class="btn btn-warning btn-sm">
                                    Edit
                                </a>

                                <form action="/admin/buku/{{ $b->id }}"
                                    method="POST"
                                    style="display:inline;">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger btn-sm">
                                        Hapus
                                    </button>

                                </form>

                            </td>

                        </tr>
                        @endforeach
                    </tbody>

                </table>

            </div>

        </div>
        <a href="/admin/dashboard"
            class="btn btn-success btn-sm mt-3">
            + Kembali ke dashboard
        </a>
    </div>

</body>

</html>