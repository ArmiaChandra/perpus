<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Kelola Anggota</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark px-3">
        <span class="navbar-brand">Kelola Anggota</span>

        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>
    </nav>

    <div class="container mt-4">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-primary text-white d-flex justify-content-between">
                <h5>Data Anggota</h5>

                <button class="btn btn-light"
                    data-bs-toggle="modal"
                    data-bs-target="#tambahModal">
                    + Tambah
                </button>
            </div>

            <div class="card-body">

                <table class="table table-bordered text-center">
                    <tr>
                        <th>NIS</th>
                        <th>Nama</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>Username</th>
                        <th>Aksi</th>
                    </tr>

                    @foreach($anggota as $a)
                    <tr>
                        <td>{{ $a->nis }}</td>
                        <td>{{ $a->nama }}</td>
                        <td>{{ $a->kelas }}</td>
                        <td>{{ $a->jurusan }}</td>
                        <td>{{ $a->username }}</td>

                        <td>
                            <button class="btn btn-warning btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#editModal{{ $a->id }}">
                                Edit
                            </button>

                            <a href="/admin/anggota/delete/{{ $a->id }}"
                                class="btn btn-danger btn-sm">
                                Hapus
                            </a>
                        </td>
                    </tr>

                    <!-- MODAL EDIT -->
                    <div class="modal fade" id="editModal{{ $a->id }}">
                        <div class="modal-dialog">
                            <form method="POST"
                                action="/admin/anggota/update/{{ $a->id }}">
                                @csrf

                                <div class="modal-content">
                                    <div class="modal-header bg-warning">
                                        <h5>Edit Anggota</h5>
                                    </div>

                                    <div class="modal-body">
                                        <input name="nis" value="{{ $a->nis }}" class="form-control mb-2">
                                        <input name="nama" value="{{ $a->nama }}" class="form-control mb-2">
                                        <input name="kelas" value="{{ $a->kelas }}" class="form-control mb-2">
                                        <input name="jurusan" value="{{ $a->jurusan }}" class="form-control mb-2">
                                        <input name="username" value="{{ $a->username }}" class="form-control mb-2">
                                    </div>

                                    <div class="modal-footer">
                                        <button class="btn btn-primary">Update</button>
                                    </div>

                                </div>
                            </form>
                        </div>
                    </div>

                    @endforeach

                </table>

            </div>
        </div>
        <a href="/admin/dashboard"
            class="btn btn-success btn-sm mt-3">
            + Kembali ke dashboard
        </a>
    </div>

    <!-- MODAL TAMBAH -->
    <div class="modal fade" id="tambahModal">
        <div class="modal-dialog">
            <form method="POST"
                action="/admin/anggota/store">
                @csrf

                <div class="modal-content">
                    <div class="modal-header bg-primary text-white">
                        <h5>Tambah Anggota</h5>
                    </div>

                    <div class="modal-body">
                        <input name="nis" placeholder="NIS" class="form-control mb-2">
                        <input name="nama" placeholder="Nama" class="form-control mb-2">
                        <input name="kelas" placeholder="Kelas" class="form-control mb-2">
                        <input name="jurusan" placeholder="Jurusan" class="form-control mb-2">
                        <input name="username" placeholder="Username" class="form-control mb-2">
                        <input name="password" type="password" placeholder="Password" class="form-control mb-2">
                    </div>

                    <div class="modal-footer">
                        <button class="btn btn-success">Simpan</button>
                    </div>

                </div>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>