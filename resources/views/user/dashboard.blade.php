<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard User | Kuliner Lokal</title>

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
            padding: 1.5rem 2rem;
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
        }

        .banner-promo {
            background: linear-gradient(135deg, #e6f4ea 0%, #c8e6c9 100%);
            border-radius: 24px;
            padding: 2rem;
            position: relative;
            overflow: hidden;
        }

        .btn-theme-green {
            background-color: var(--primary-green);
            color: #ffffff;
            border: none;
            border-radius: 12px;
            padding: 0.6rem 1.4rem;
            font-weight: 600;
            transition: all 0.2s;
        }

        .btn-theme-green:hover {
            background-color: var(--primary-hover);
            color: #ffffff;
            transform: translateY(-2px);
        }

        /* Category Chips */
        .category-chip {
            background: #ffffff;
            border-radius: 20px;
            padding: 0.8rem 1rem;
            text-align: center;
            cursor: pointer;
            transition: all 0.2s ease;
            border: 1px solid #edf2f7;
            min-width: 90px;
            user-select: none;
        }

        .category-chip:hover, .category-chip.active {
            background-color: var(--primary-green);
            color: #ffffff;
            box-shadow: 0 8px 16px rgba(15, 138, 95, 0.2);
            border-color: var(--primary-green);
        }

        .category-chip i {
            font-size: 1.5rem;
            display: block;
            margin-bottom: 0.2rem;
        }

        .card-food {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #f0f0f0;
            padding: 1rem;
            transition: all 0.25s ease;
            position: relative;
        }

        .card-food:hover {
            transform: translateY(-6px);
            box-shadow: 0 12px 24px rgba(0, 0, 0, 0.06);
        }

        .food-img-container {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            overflow: hidden;
            margin: 0 auto 0.75rem auto;
            box-shadow: 0 8px 16px rgba(0,0,0,0.08);
        }

        .food-img-container img {
            width: 100%;
            height: 100%;
            object-fit: cover;
        }

        .btn-add-cart {
            width: 36px;
            height: 36px;
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
        .right-panel {
            background: #ffffff;
            border-radius: 24px;
            padding: 1.5rem;
            border: 1px solid #edf2f7;
        }

        .order-item-card {
            background: #f8fafc;
            border-radius: 16px;
            padding: 0.75rem 1rem;
            margin-bottom: 0.75rem;
            display: flex;
            align-items: center;
            gap: 0.75rem;
        }

        .order-item-img {
            width: 44px;
            height: 44px;
            border-radius: 50%;
            object-fit: cover;
        }

        .credit-card-widget {
            background: linear-gradient(135deg, #0f8a5f 0%, #064e3b 100%);
            border-radius: 20px;
            color: white;
            padding: 1.25rem;
            box-shadow: 0 10px 20px rgba(15, 138, 95, 0.25);
        }

        .btn-bell {
            background: transparent;
            border: none;
            position: relative;
            cursor: pointer;
            padding: 0;
            color: #718096;
            transition: color 0.2s;
        }

        .btn-bell:hover {
            color: var(--primary-green);
        }

        .bell-dot {
            position: absolute;
            top: 2px;
            right: 2px;
            width: 8px;
            height: 8px;
            background-color: #e53e3e;
            border-radius: 50%;
            border: 2px solid #ffffff;
        }
    </style>
</head>
<body>

    <aside class="sidebar-left d-none d-md-flex">
        <div class="sidebar-brand">
            <i class="bi bi-shop"></i>
        </div>
        <nav class="sidebar-nav">
            <a href="{{ route('user.dashboard') }}" class="nav-link active" title="Dashboard">
                <i class="bi bi-house-door-fill"></i>
            </a>
            <a href="{{ route('user.catalog') }}" class="nav-link" title="Catalog">
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
        <div class="row g-4">

            <div class="col-lg-8">

                <div class="d-flex justify-content-between align-items-center mb-4">
                    <div>
                        <h4 class="fw-bold mb-0">Today Menu 😊</h4>
                        <p class="text-muted small mb-0">Nikmati sajian kuliner favoritmu hari ini.</p>
                    </div>
                    <div class="search-box d-flex align-items-center d-none d-sm-flex">
                        <i class="bi bi-search text-muted me-2"></i>
                        <input type="text" id="searchInput" class="form-control border-0 bg-transparent p-0 small" placeholder="Cari menu makanan...">
                    </div>
                </div>

                <div class="banner-promo mb-4">
                    <div class="row align-items-center">
                        <div class="col-md-8">
                            <span class="badge bg-white text-success px-3 py-1 rounded-pill fw-semibold small mb-2 shadow-sm">
                                Special Offer
                            </span>
                            <h3 class="fw-bold text-dark mb-1">Halo, {{ Auth::user()->name ?? 'User' }} 👋</h3>
                            <p class="text-muted small mb-3">Dapatkan promo menarik & hidangan terpopuler khusus untukmu hari ini!</p>
                            <a href="{{ route('user.catalog') }}" class="btn btn-theme-green btn-sm px-4">
                                Pesan Sekarang
                            </a>
                        </div>
                        <div class="col-md-4 text-center d-none d-md-block">
                            <i class="bi bi-basket3-fill text-success" style="font-size: 5rem; opacity: 0.8;"></i>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Kategori Menu</h5>
                    <a href="{{ route('user.catalog') }}" class="text-success small text-decoration-none fw-semibold">View All <i class="bi bi-chevron-right"></i></a>
                </div>

                <div class="d-flex gap-3 overflow-x-auto pb-2 mb-4">
                    <div class="category-chip active" data-category="semua">
                        <i class="bi bi-fire"></i>
                        <span class="small fw-semibold">Semua</span>
                    </div>
                    <div class="category-chip" data-category="makanan">
                        <i class="bi bi-egg-fried"></i>
                        <span class="small fw-semibold">Makanan</span>
                    </div>
                    <div class="category-chip" data-category="minuman">
                        <i class="bi bi-cup-hot"></i>
                        <span class="small fw-semibold">Minuman</span>
                    </div>
                </div>

                <div class="d-flex justify-content-between align-items-center mb-3">
                    <h5 class="fw-bold mb-0">Menu Rekomendasi Terpopuler 🔥</h5>
                </div>

                <div class="row g-3" id="menuGrid">
                    @forelse($recommendedMenus as $menu)
                        <div class="col-sm-6 col-md-4 menu-item-col" 
                             data-name="{{ strtolower($menu->nama_menu) }}" 
                             data-category="{{ strtolower(trim($menu->kategori ?? 'makanan')) }}">
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
                                    <p class="text-muted small mb-3 text-truncate">{{ $menu->deskripsi ?? 'Menu pilihan populer' }}</p>
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
                        <div class="col-12" id="emptyMenuAlert">
                            <div class="bg-white rounded-4 p-4 text-center text-muted">
                                Belum ada menu rekomendasi yang tersedia saat ini.
                            </div>
                        </div>
                    @endforelse
                </div>

                <div id="noResultAlert" class="bg-white rounded-4 p-4 text-center text-muted d-none mt-3">
                    <i class="bi bi-search fs-3 text-muted d-block mb-2"></i>
                    Menu yang kamu cari tidak ditemukan.
                </div>

            </div>

            <div class="col-lg-4">
                <div class="right-panel">

                    <div class="d-flex justify-content-between align-items-center mb-4">
                        <div class="d-flex align-items-center gap-3">
                            <div class="position-relative">
                                @if(Auth::user()->foto)
                                    <img src="{{ asset('storage/' . Auth::user()->foto) }}" alt="Profile" class="rounded-circle object-fit-cover" style="width: 44px; height: 44px;">
                                @else
                                    <div class="bg-success text-white rounded-circle d-flex align-items-center justify-content-center fw-bold" style="width: 44px; height: 44px;">
                                        {{ strtoupper(substr(Auth::user()->name ?? 'U', 0, 1)) }}
                                    </div>
                                @endif

                                <button type="button" class="btn btn-sm btn-light border rounded-circle position-absolute bottom-0 end-0 p-0 d-flex align-items-center justify-content-center shadow-sm" style="width: 20px; height: 20px;" data-bs-toggle="modal" data-bs-target="#uploadFotoModal" title="Ubah Foto Profil">
                                    <i class="bi bi-pencil-fill" style="font-size: 0.6rem; color: #0f8a5f;"></i>
                                </button>
                            </div>

                            <div>
                                <h6 class="fw-bold mb-0 small">{{ Auth::user()->name ?? 'User' }}</h6>
                                <span class="text-muted extra-small" style="font-size: 0.75rem;">Pelanggan Setia</span>
                            </div>
                        </div>

                        <button type="button" class="btn-bell" data-bs-toggle="modal" data-bs-target="#notifikasiModal" title="Notifikasi">
                            <i class="bi bi-bell fs-5"></i>
                            <span class="bell-dot"></span>
                        </button>
                    </div>

                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show p-2 small mb-3 rounded-3" role="alert">
                            <i class="bi bi-check-circle-fill me-1"></i> {{ session('success') }}
                            <button type="button" class="btn-close p-2" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    @endif

                    <div class="credit-card-widget mb-4">
                        <div class="d-flex justify-content-between align-items-center mb-3">
                            <span class="small opacity-75">Status Keanggotaan</span>
                            <i class="bi bi-person-badge fs-5"></i>
                        </div>
                        <span class="d-block small opacity-75 mb-1">Status Akun</span>
                        <h4 class="fw-bold mb-3">Pengguna Aktif</h4>
                        <div class="d-flex justify-content-between align-items-center extra-small opacity-75" style="font-size: 0.75rem;">
                            <span>{{ Auth::user()->email ?? 'user@gmail.com' }}</span>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="fw-bold mb-0">Rekomendasi Cepat</h6>
                        <a href="{{ route('user.catalog') }}" class="text-success small text-decoration-none fw-semibold">Lihat Katalog</a>
                    </div>

                    @forelse($recommendedMenus->take(2) as $item)
                        <div class="order-item-card">
                            @if($item->foto)
                                <img src="{{ asset('storage/' . $item->foto) }}" class="order-item-img" alt="{{ $item->nama_menu }}">
                            @else
                                <div class="order-item-img bg-light d-flex align-items-center justify-content-center text-muted">
                                    <i class="bi bi-egg-fried"></i>
                                </div>
                            @endif
                            <div class="flex-grow-1 overflow-hidden">
                                <h6 class="fw-bold text-dark mb-0 small text-truncate">{{ $item->nama_menu }}</h6>
                                <span class="text-muted extra-small" style="font-size: 0.75rem;">Favorit Pelanggan</span>
                            </div>
                            <span class="fw-bold text-success small">Rp {{ number_format($item->harga, 0, ',', '.') }}</span>
                        </div>
                    @empty
                        <div class="text-center text-muted small py-3">
                            Belum ada menu tersedia
                        </div>
                    @endforelse

                    <div class="mt-4">
                        <a href="{{ route('user.catalog') }}" class="btn btn-theme-green w-100 py-2 rounded-3 fw-semibold text-center d-block text-decoration-none">
                            Lihat Semua Menu
                        </a>
                    </div>

                </div>
            </div>

        </div>
    </div>

    <div class="modal fade" id="notifikasiModal" tabindex="-1" aria-labelledby="notifikasiModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow rounded-4">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title fw-bold text-dark" id="notifikasiModalLabel">
                        <i class="bi bi-bell-fill text-success me-2"></i>Notifikasi Saya
                    </h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body py-3">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item bg-light rounded-3 p-3 mb-2 border-0">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="fw-bold small text-success">🎉 Promo Spesial Hari Ini</span>
                                <span class="text-muted extra-small" style="font-size: 0.7rem;">Baru Saja</span>
                            </div>
                            <p class="text-muted small mb-0">Dapatkan diskon untuk hidangan favoritmu di Kuliner Lokal!</p>
                        </div>
                        <div class="list-group-item bg-light rounded-3 p-3 mb-2 border-0">
                            <div class="d-flex justify-content-between align-items-center mb-1">
                                <span class="fw-bold small text-dark">📦 Status Akun</span>
                                <span class="text-muted extra-small" style="font-size: 0.7rem;">Hari ini</span>
                            </div>
                            <p class="text-muted small mb-0">Akun kamu sebagai Pengguna Aktif siap digunakan untuk pemesanan online.</p>
                        </div>
                    </div>
                </div>
                <div class="modal-footer border-0 pt-0">
                    <button type="button" class="btn btn-light btn-sm rounded-3 fw-semibold w-100" data-bs-dismiss="modal">Tutup</button>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="uploadFotoModal" tabindex="-1" aria-labelledby="uploadFotoModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-sm">
            <div class="modal-content border-0 shadow rounded-4">
                <div class="modal-header border-0 pb-0">
                    <h6 class="modal-title fw-bold text-dark" id="uploadFotoModalLabel">Ubah Foto Profil</h6>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('user.profile.photo.update') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-body py-3">
                        <div class="mb-3">
                            <label for="foto" class="form-label small text-muted">Pilih foto baru (Maks. 2MB)</label>
                            <input type="file" class="form-control form-control-sm rounded-3" id="foto" name="foto" accept="image/*" required>
                        </div>
                    </div>
                    <div class="modal-footer border-0 pt-0">
                        <button type="button" class="btn btn-light btn-sm rounded-3 fw-semibold" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-theme-green btn-sm rounded-3 px-3 fw-semibold">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const searchInput = document.getElementById('searchInput');
        const categoryChips = document.querySelectorAll('.category-chip');
        const menuItems = document.querySelectorAll('.menu-item-col');
        const noResultAlert = document.getElementById('noResultAlert');

        let activeCategory = 'semua';

        const drinkKeywords = ['jus', 'es', 'teh', 'kopi', 'air', 'drink', 'beverage', 'boba', 'milk', 'susu', 'sirup', 'squash'];
        const snackKeywords = ['camilan', 'snack', 'keripik', 'roti', 'pisang', 'kentang', 'kue', 'donut', 'risol', 'gorengan'];

        function filterMenu() {
            const searchQuery = searchInput ? searchInput.value.toLowerCase().trim() : '';
            let visibleCount = 0;

            menuItems.forEach(item => {
                const name = (item.getAttribute('data-name') || '').toLowerCase();
                const dbCategory = (item.getAttribute('data-category') || '').toLowerCase();

                const isDrink = dbCategory.includes('minuman') || drinkKeywords.some(kw => name.includes(kw));
                const isSnack = dbCategory.includes('camilan') || snackKeywords.some(kw => name.includes(kw));

                let matchesCategory = false;

                if (activeCategory === 'semua') {
                    matchesCategory = true;
                } else if (activeCategory === 'minuman') {
                    matchesCategory = isDrink;
                } else if (activeCategory === 'camilan') {
                    matchesCategory = isSnack;
                } else if (activeCategory === 'makanan') {
                    matchesCategory = !isDrink && !isSnack;
                }

                const matchesSearch = name.includes(searchQuery);

                if (matchesCategory && matchesSearch) {
                    item.classList.remove('d-none');
                    visibleCount++;
                } else {
                    item.classList.add('d-none');
                }
            });

            if (noResultAlert) {
                if (visibleCount === 0 && menuItems.length > 0) {
                    noResultAlert.classList.remove('d-none');
                } else {
                    noResultAlert.classList.add('d-none');
                }
            }
        }

        if (searchInput) {
            searchInput.addEventListener('input', filterMenu);
        }

        categoryChips.forEach(chip => {
            chip.addEventListener('click', function () {
                categoryChips.forEach(c => c.classList.remove('active'));
                this.classList.add('active');

                activeCategory = this.getAttribute('data-category').toLowerCase().trim();
                filterMenu();
            });
        });
    });
</script>
</body>
</html>