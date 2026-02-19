<!DOCTYPE html>
<html>

<head>
    <title>Register</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="container mt-5 col-md-5">
        <div class="card shadow">
            <div class="card-header text-center bg-success text-white">
                <h4>REGISTER SISWA</h4>
            </div>

            <div class="card-body">

                <form method="POST" action="/register">
                    @csrf

                    <input type="text" name="nis" class="form-control mb-2" placeholder="NIS" required>
                    <input type="text" name="nama" class="form-control mb-2" placeholder="Nama" required>
                    <input type="text" name="kelas" class="form-control mb-2" placeholder="Kelas" required>
                    <input type="text" name="jurusan" class="form-control mb-2" placeholder="Jurusan" required>
                    <input type="text" name="username" class="form-control mb-2" placeholder="Username" required>
                    <input type="password" name="password" class="form-control mb-3" placeholder="Password" required>

                    <button class="btn btn-success w-100">
                        Register
                    </button>
                </form>

            </div>
        </div>
    </div>

</body>

</html>