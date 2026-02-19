<!DOCTYPE html>
<html>

<head>
    <title>Edit Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        <div class="card shadow">
            <div class="card-body">

                <h4 class="mb-4 text-center">
                    Edit Buku
                </h4>

                <form action="/admin/buku/{{ $buku->id }}"
                    method="POST">

                    @csrf
                    @method('PUT')

                    <input name="kode_buku"
                        value="{{ $buku->kode_buku }}"
                        class="form-control mb-3">

                    <input name="judul"
                        value="{{ $buku->judul }}"
                        class="form-control mb-3">

                    <input name="pengarang"
                        value="{{ $buku->pengarang }}"
                        class="form-control mb-3">

                    <input name="penerbit"
                        value="{{ $buku->penerbit }}"
                        class="form-control mb-3">

                    <input name="tahun"
                        value="{{ $buku->tahun }}"
                        class="form-control mb-3">

                    <input name="stok"
                        value="{{ $buku->stok }}"
                        class="form-control mb-3">

                    <button class="btn btn-primary w-100">
                        Update Buku
                    </button>

                </form>

            </div>
        </div>

    </div>

</body>

</html>