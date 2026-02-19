<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Tambah Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="row justify-content-center">
            <div class="col-md-6">

                <div class="card shadow border-0">

                    <div class="card-header bg-primary text-white">
                        <h5 class="mb-0">
                            Tambah Data Buku
                        </h5>
                    </div>

                    <div class="card-body">

                        <form action="/admin/buku" method="POST">
                            @csrf

                            <div class="mb-3">
                                <label class="form-label">
                                    Kode Buku
                                </label>
                                <input type="text"
                                    name="kode_buku"
                                    class="form-control"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Judul Buku
                                </label>
                                <input type="text"
                                    name="judul"
                                    class="form-control"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Pengarang
                                </label>
                                <input type="text"
                                    name="pengarang"
                                    class="form-control"
                                    required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">
                                    Penerbit
                                </label>
                                <input type="text"
                                    name="penerbit"
                                    class="form-control"
                                    required>
                            </div>

                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Tahun
                                    </label>
                                    <input type="number"
                                        name="tahun"
                                        class="form-control"
                                        required>
                                </div>

                                <div class="col-md-6 mb-3">
                                    <label class="form-label">
                                        Stok
                                    </label>
                                    <input type="number"
                                        name="stok"
                                        class="form-control"
                                        required>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">

                                <a href="/admin/buku"
                                    class="btn btn-secondary">
                                    Kembali
                                </a>

                                <button class="btn btn-success">
                                    Simpan Buku
                                </button>

                            </div>

                        </form>

                    </div>

                </div>

            </div>
        </div>

    </div>

</body>

</html>