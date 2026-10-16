<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Admin - UTP PWL</title>
    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('admin.dashboard') }}">Admin Panel - Kelompok 9</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('admin.dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.menus.index') }}">Kelola Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('admin.orders.index') }}">Kelola Pesanan</a>
                    </li>
                </ul>
                <form method="POST" action="{{ route('logout') }}" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">Logout</button>
                </form>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="row mb-4">
            <div class="col-md-12">
                <div class="p-4 bg-white rounded-3 shadow-sm border">
                    <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                        <div>
                            <h3 class="fw-bold text-dark mb-1">Selamat datang, Admin!</h3>
                            <p class="text-muted mb-0">Kelola menu kuliner lokal dan pantau pesanan masuk dari pelanggan dengan mudah melalui panel ini.</p>
                        </div>
                        <span class="badge bg-primary fs-6 px-3 py-2">Role: Administrator</span>
                    </div>
                </div>
            </div>
        </div>

        <div class="row g-4">
            <div class="col-md-6">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body d-flex flex-column justify-content-between p-4">
                        <div>
                            <h4 class="card-title fw-bold text-dark mb-3">Kelola Menu</h4>
                            <p class="card-text text-muted mb-4">Tambah, ubah, atau hapus daftar menu kuliner pre-order yang tersedia untuk pengguna.</p>
                        </div>
                        <a href="{{ route('admin.menus.index') }}" class="btn btn-dark w-100 py-2">Buka Menu</a>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="card shadow-sm h-100 border-0">
                    <div class="card-body d-flex flex-column justify-content-between p-4">
                        <div>
                            <h4 class="card-title fw-bold text-dark mb-3">Kelola Pesanan</h4>
                            <p class="card-text text-muted mb-4">Pantau daftar pesanan masuk, perbarui status pesanan, dan kelola data transaksi.</p>
                        </div>
                        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary w-100 py-2">Buka Kelola Pesanan</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>