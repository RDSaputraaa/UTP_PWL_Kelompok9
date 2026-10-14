
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
</head>
<body class="bg-light">
    <nav class="navbar navbar-dark bg-primary">
        <div class="container">
            <span class="navbar-brand">Project Kelompok</span>

            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button class="btn btn-light btn-sm" type="submit">
                    Logout
                </button>
            </form>
        </div>
    </nav>

    <div class="container py-5">
        <div class="card border-0 shadow-sm p-4">
            <h3>Selamat datang, {{ auth()->user()->name }}!</h3>
            <p class="text-muted mb-0">
                Kamu berhasil login ke dalam sistem.
            </p>
        </div>
    </div>
</body>
</html>
