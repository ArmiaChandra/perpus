<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <title>Peminjaman Buku</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5">

        @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
        @endif

        @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
        @endif

        <div class="card shadow">
            <div class="card-header bg-primary text-white">
                Daftar Buku
            </div>

            <div class="card-body">

                <table class="table table-bordered text-center">
                    <tr>
                        <th>Judul Buku</th>
                        <th>Stok</th>
                        <th>Aksi</th>
                    </tr>

                    @foreach($buku as $b)
                    <tr>
                        <td>{{ $b->judul }}</td>

                        <td>
                            @if($b->stok > 0)
                            {{ $b->stok }}
                            @else
                            <span class="text-danger">Habis</span>
                            @endif
                        </td>

                        <td>
                            @if($b->stok > 0)

                            <form action="{{ route('siswa.pinjam') }}" method="POST">
                                @csrf
                                <input type="hidden" name="buku_id" value="{{ $b->id }}">
                                <button class="btn btn-success btn-sm">
                                    Pinjam
                                </button>
                            </form>

                            @else
                            -
                            @endif
                        </td>

                    </tr>
                    @endforeach

                </table>

            </div>
        </div>

    </div>

</body>

</html>