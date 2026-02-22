<!DOCTYPE html>
<html>

<head>
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-light">

    <div class="d-flex align-items-center justify-content-center min-vh-100">
        <div class="card shadow" style="width:380px;">
            <div class="card-header text-center bg-primary text-white">
                <h4>LOGIN</h4>
            </div>

            <div class="card-body">

                @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
                @endif

                <form method="POST" action="/login">
                    @csrf

                    <input type="text" name="username" class="form-control mb-3"
                        placeholder="Username" required>

                    <input type="password" name="password" class="form-control mb-3"
                        placeholder="Password" required>

                    <button class="btn btn-primary w-100">
                        Login
                    </button>
                </form>

                <div class="text-center mt-3">
                    Belum punya akun?
                    <a href="/register">Daftar</a>
                </div>

            </div>
        </div>
    </div>

</body>

</html>