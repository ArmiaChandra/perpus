<!DOCTYPE html>
<html>

<head>
    <title>Siswa</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <nav class="navbar navbar-dark bg-dark px-3">
        <a href="/siswa/dashboard" class="navbar-brand">Perpustakaan</a>
        <form action="/logout" method="POST">
            @csrf
            <button class="btn btn-danger btn-sm">Logout</button>
        </form>
    </nav>

    <div class="container mt-4">
        @yield('content')
    </div>

</body>

</html>