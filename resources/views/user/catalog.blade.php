<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Menu</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }
        .card-menu {
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }
        .card-menu:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.08) !important;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm py-3 mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="#">Pre-Order Makanan</a>
            <div class="navbar-nav ms-auto">
                <a class="nav-link active fw-semibold text-dark" href="{{ route('user.catalog') }}">Katalog Menu</a>
            </div>
        </div>
    </nav>

    <div class="container">
        <div class="row mb-5">
            <div class="col-md-12 text-center">
                <h2 class="fw-bold text-dark">Katalog Menu Kami</h2>
                <p class="text-muted">Pilih menu favoritmu dan lakukan pre-order sekarang juga!</p>
            </div>
        </div>

        <div class="row">
            @forelse ($menus as $menu)
                <div class="col-md-4 mb-4">
                    <div class="card card-menu h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                        @if($menu->foto)
                            <img src="{{ asset('storage/' . $menu->foto) }}" class="card-img-top" alt="{{ $menu->nama_menu }}" style="height: 220px; object-fit: cover;">
                        @else
                            <div class="bg-light text-muted d-flex align-items-center justify-content-center" style="height: 220px;">
                                <span>Tidak ada foto</span>
                            </div>
                        @endif
                        
                        <div class="card-body d-flex flex-column p-4">
                            <h5 class="card-title fw-bold text-dark mb-1">{{ $menu->nama_menu }}</h5>
                            <p class="card-text text-dark fw-bold fs-5 mb-2">Rp {{ number_format($menu->harga, 0, ',', '.') }}</p>
                            <p class="card-text text-muted small mb-4">{{ $menu->deskripsi }}</p>
                            
                            <div class="mt-auto">
                                <a href="#" class="btn btn-dark w-100 rounded-3 py-2 fw-semibold">Pesan / Pre-Order</a>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-md-12 text-center py-5">
                    <p class="text-muted">Belum ada menu yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </div>
</body>
</html>