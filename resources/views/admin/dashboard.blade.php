<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Dashboard Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <nav class="navbar navbar-dark bg-dark px-3">
        <span class="navbar-brand">
            Dashboard Admin
        </span>

        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-danger btn-sm">
                Logout
            </button>
        </form>
    </nav>

    <div class="container mt-4">
        
        <div class="row">

            {{-- KELOLA BUKU --}}
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5>📚</h5>
                        <h6>Kelola Buku</h6>
                        <p class="text-muted">Tambah, Edit, Hapus Buku</p>

                        <a href="/admin/buku"
                            class="btn btn-primary btn-sm">
                            Masuk
                        </a>
                    </div>
                </div>
            </div>

            {{-- TRANSAKSI --}}
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5>🔁</h5>
                        <h6>Transaksi</h6>
                        <p class="text-muted">Lihat Histori Peminjaman</p>
                        <a href="/admin/histori"
                            class="btn btn-warning btn-sm">
                            Masuk
                        </a>
                    </div>
                </div>
            </div>

            {{-- KELOLA ANGGOTA --}}
            <div class="col-md-4 mb-3">
                <div class="card shadow-sm text-center">
                    <div class="card-body">
                        <h5>👨‍🎓</h5>
                        <h6>Kelola Anggota</h6>
                        <p class="text-muted">Data Siswa</p>

                        <a href="/admin/anggota"
                            class="btn btn-success btn-sm">
                            Masuk
                        </a>
                    </div>
                </div>
            </div>

        </div>

    </div>

</body>

</html>