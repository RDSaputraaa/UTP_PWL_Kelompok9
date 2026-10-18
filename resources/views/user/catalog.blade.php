<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Katalog Menu | Kuliner Lokal</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.1/font/bootstrap-icons.css">

    <style>
        :root {
            --primary-green: #0f8a5f;
            --primary-hover: #0c6f4d;
            --bg-light: #f4f7f6;
            --card-bg: #ffffff;
        }

        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: var(--bg-light);
            color: #2d3748;
            overflow-x: hidden;
        }

        .sidebar-left {
            width: 80px;
            background-color: var(--card-bg);
            min-height: 100vh;
            border-right: 1px solid #edf2f7;
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 1.5rem 0;
            position: fixed;
            top: 0;
            left: 0;
            z-index: 100;
        }

        .sidebar-brand {
            width: 48px;
            height: 48px;
            background-color: var(--primary-green);
            color: #fff;
            border-radius: 16px;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.4rem;
            margin-bottom: 2.5rem;
            box-shadow: 0 8px 16px rgba(15, 138, 95, 0.25);
        }

        .sidebar-nav .nav-link {
            width: 48px;
            height: 48px;
            border-radius: 14px;
            display: flex;
            align-items: center;
            justify-content: center;
            color: #a0aec0;
            font-size: 1.25rem;
            margin-bottom: 0.75rem;
            transition: all 0.2s ease;
        }

        .sidebar-nav .nav-link:hover,
        .sidebar-nav .nav-link.active {
            background-color: rgba(15, 138, 95, 0.1);
            color: var(--primary-green);
        }

        .main-wrapper {
            margin-left: 80px;
            padding: 1.5rem 2.5rem;
        }

        @media (max-width: 767.98px) {
            .main-wrapper {
                margin-left: 0;
                padding: 1rem;
            }
        }

        .search-box {
            background-color: #ffffff;
            border: 1px solid #e2e8f0;
            border-radius: 50px;
            padding: 0.5rem 1.25rem;
            max-width: 380px;
            width: 100%;
        }

        .card-food {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #f0f0f0;
            padding: 1.25rem;
            transition: all 0.25s ease;
            position: relative;
        }

        .card-food:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.06);
        }

        .food-img-container {
            width: 130px;
            height: 130px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 1rem auto;
            box-shadow: 0 8px 16px rgba(0,0,0,0.08);
        }

        .food-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-add-cart {
            width: 38px;
            height: 38px;
            border-radius: 50%;
            background-color: var(--primary-green);
            color: #ffffff;
            display: flex;
            align-items: center;
            justify-content: center;
            border: none;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-add-cart:hover {
            background-color: var(--primary-hover);
            color: #ffffff;
            transform: scale(1.1);
        }
    </style>
</head>
<body>

    <aside class="sidebar-left d-none d-md-flex">
        <div class="sidebar-brand">
            <i class="bi bi-shop"></i>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('user.dashboard') }}" class="nav-link" title="Dashboard">
                <i class="bi bi-house-door-fill"></i>
            </a>
            <a href="{{ route('user.catalog') }}" class="nav-link active" title="Catalog">
                <i class="bi bi-grid-fill"></i>
            </a>
            <a href="{{ route('user.orders.index') }}" class="nav-link" title="Riwayat Pesanan">
                <i class="bi bi-receipt"></i>
            </a>
        </nav>
        <div class="mt-auto">
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn text-danger border-0 p-0" title="Logout">
                    <i class="bi bi-box-arrow-right fs-4"></i>
                </button>
            </form>
        </div>
    </aside>

    <div class="main-wrapper">

        <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">
            <div>
                <h4 class="fw-bold mb-0">Katalog Kuliner 🍲</h4>
                <p class="text-muted small mb-0">Pilih hidangan favoritmu dari seluruh menu yang tersedia.</p>
            </div>

            <div class="search-box d-flex align-items-center">
                <i class="bi bi-search text-muted me-2"></i>
                <input type="text" id="searchCatalogInput" class="form-control border-0 bg-transparent p-0 small" placeholder="Cari makanan & minuman...">
            </div>
        </div>

        <div class="row g-4" id="catalogGrid">
            @forelse($menus as $menu)
                <div class="col-sm-6 col-md-4 col-xl-3 catalog-item-col" 
                     data-name="{{ strtolower($menu->nama_menu) }}" 
                     data-desc="{{ strtolower($menu->deskripsi ?? '') }}">
                    <div class="card-food text-center h-100 d-flex flex-column justify-content-between">
                        <div>
                            <div class="food-img-container">
                                @if($menu->foto)
                                    <img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama_menu }}">
                                @else
                                    <div class="bg-light w-100 h-100 d-flex align-items-center justify-content-center text-muted">
                                        <i class="bi bi-image fs-3"></i>
                                    </div>
                                @endif
                            </div>

                            <h6 class="fw-bold text-dark mb-1 text-truncate">{{ $menu->nama_menu }}</h6>
                            <p class="text-muted small mb-3 text-truncate">{{ $menu->deskripsi ?? 'Kuliner Lezat & Nikmat' }}</p>
                        </div>

                        <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                            <span class="fw-bold text-success fs-6">
                                Rp {{ number_format($menu->harga, 0, ',', '.') }}
                            </span>
                            <a href="{{ route('user.orders.create', $menu->id) }}" class="btn-add-cart" title="Pesan Menu">
                                <i class="bi bi-plus-lg"></i>
                            </a>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12">
                    <div class="bg-white rounded-4 p-5 text-center text-muted border">
                        <i class="bi bi-inbox fs-1 text-success d-block mb-2"></i>
                        Belum ada menu kuliner yang tersedia saat ini.
                    </div>
                </div>
            @endforelse
        </div>

        <div id="noCatalogResult" class="bg-white rounded-4 p-5 text-center text-muted border d-none mt-3">
            <i class="bi bi-search fs-1 text-muted d-block mb-2"></i>
            Menu yang kamu cari tidak ditemukan. Coba gunakan kata kunci lain.
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const searchInput = document.getElementById('searchCatalogInput');
            const catalogItems = document.querySelectorAll('.catalog-item-col');
            const noResultAlert = document.getElementById('noCatalogResult');

            if (searchInput) {
                searchInput.addEventListener('input', function () {
                    const query = this.value.toLowerCase().trim();
                    let visibleCount = 0;

                    catalogItems.forEach(item => {
                        const name = item.getAttribute('data-name') || '';
                        const desc = item.getAttribute('data-desc') || '';

                        if (name.includes(query) || desc.includes(query)) {
                            item.classList.remove('d-none');
                            visibleCount++;
                        } else {
                            item.classList.add('d-none');
                        }
                    });

                    if (visibleCount === 0 && catalogItems.length > 0) {
                        noResultAlert.classList.remove('d-none');
                    } else {
                        noResultAlert.classList.add('d-none');
                    }
                });
            }
        });
    </script>
</body>
</html>