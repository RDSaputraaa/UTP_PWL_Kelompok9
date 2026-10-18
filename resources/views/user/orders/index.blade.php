<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Riwayat Pesanan | Kuliner Lokal</title>

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

        .order-card {
            background: #ffffff;
            border-radius: 20px;
            border: 1px solid #edf2f7;
            padding: 1.25rem 1.5rem;
            margin-bottom: 1rem;
            transition: all 0.2s;
        }

        .order-card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.04);
        }

        .badge-status {
            padding: 0.4rem 0.8rem;
            border-radius: 50px;
            font-size: 0.75rem;
            font-weight: 600;
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
            <a href="{{ route('user.catalog') }}" class="nav-link" title="Catalog">
                <i class="bi bi-grid-fill"></i>
            </a>
            <a href="{{ route('user.orders.index') }}" class="nav-link active" title="Riwayat Pesanan">
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
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h4 class="fw-bold mb-0">Riwayat Pesanan 📜</h4>
                <p class="text-muted small mb-0">Pantau status pesanan dan transaksi kulinermu.</p>
            </div>
            <a href="{{ route('user.catalog') }}" class="btn btn-sm text-white rounded-3 px-3 fw-semibold" style="background-color: var(--primary-green);">
                + Pesan Lagi
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show p-3 rounded-4 mb-4 small" role="alert">
                <i class="bi bi-check-circle-fill me-2"></i> {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <div class="orders-list">
            @forelse($orders as $order)
                <div class="order-card">
                    <div class="d-flex justify-content-between align-items-center mb-3 pb-2 border-bottom">
                        <div class="d-flex align-items-center gap-2">
                            <i class="bi bi-bag-check-fill text-success fs-5"></i>
                            <span class="fw-bold small text-dark">ID Pesanan #{{ $order->id }}</span>
                            <span class="text-muted extra-small ms-2" style="font-size: 0.75rem;">
                                {{ $order->created_at ? $order->created_at->format('d M Y, H:i') : '-' }}
                            </span>
                        </div>
                        <div>
                            @if($order->status === 'masuk')
                                <span class="badge badge-status bg-warning text-dark">
                                    <i class="bi bi-clock-history me-1"></i> Diproses
                                </span>
                            @elseif($order->status === 'selesai')
                                <span class="badge badge-status bg-success text-white">
                                    <i class="bi bi-check-lg me-1"></i> Selesai
                                </span>
                            @else
                                <span class="badge badge-status bg-secondary text-white">
                                    {{ ucfirst($order->status) }}
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="d-flex align-items-center justify-content-between">
                        <div class="d-flex align-items-center gap-3">
                            <div class="rounded-circle overflow-hidden bg-light d-flex align-items-center justify-content-center" style="width: 52px; height: 52px;">
                                @if(optional($order->menu)->foto)
                                    <img src="{{ asset('storage/' . $order->menu->foto) }}" alt="Menu" style="width: 100%; height: 100%; object-fit: cover;">
                                @else
                                    <i class="bi bi-egg-fried text-muted fs-4"></i>
                                @endif
                            </div>
                            <div>
                                <h6 class="fw-bold text-dark mb-0 small">{{ optional($order->menu)->nama_menu ?? 'Menu dihapus' }}</h6>
                                <span class="text-muted extra-small" style="font-size: 0.75rem;">Jumlah: {{ $order->quantity }} porsi</span>
                            </div>
                        </div>

                        <div class="text-end">
                            <span class="d-block extra-small text-muted" style="font-size: 0.75rem;">Total Harga</span>
                            <span class="fw-bold text-success fs-6">Rp {{ number_format($order->total_price, 0, ',', '.') }}</span>
                        </div>
                    </div>

                    @if($order->status === 'masuk')
                        <div class="mt-3 pt-2 text-end border-top">
                            <form action="{{ route('user.orders.destroy', $order->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah kamu yakin ingin membatalkan pesanan ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger btn-sm rounded-3 py-1 px-3 extra-small" style="font-size: 0.75rem;">
                                    Batalkan Pesanan
                                </button>
                            </form>
                        </div>
                    @endif
                </div>
            @empty
                <div class="bg-white rounded-4 p-5 text-center text-muted border">
                    <i class="bi bi-receipt fs-1 text-success d-block mb-2"></i>
                    Belum ada riwayat pesanan.
                </div>
            @endforelse
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>