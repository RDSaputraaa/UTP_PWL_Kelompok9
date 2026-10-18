@extends('layouts.navbar_admin')

@section('title', 'Dashboard Admin - UTP PWL')

@section('content')
<div class="container pb-5">
    <div class="p-4 bg-white rounded-4 shadow-sm border-0 mb-4">
        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
            <div>
                <span class="badge bg-success px-3 py-2 rounded-pill mb-2">Panel Administrator</span>
                <h3 class="fw-bold text-dark mb-1">Selamat datang kembali, Admin! 👋</h3>
                <p class="text-muted mb-0">
                    Pantau pesanan kuliner lokal dan kelola stok menu secara real-time.
                </p>
            </div>
            <div class="d-flex gap-2">
                <a href="{{ route('admin.menus.create') }}" class="btn btn-success rounded-3 px-3 py-2 fw-semibold">
                    + Tambah Menu Baru
                </a>
            </div>
        </div>
    </div>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 bg-white h-100">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-muted small fw-semibold text-uppercase mb-1">Total Menu Aktif</p>
                        <h2 class="fw-bold text-dark mb-0">{{ $totalMenu }}</h2>
                        <small class="text-muted">Siap dipesan pembeli</small>
                    </div>
                    <div class="bg-light rounded-circle d-flex align-items-center justify-content-center" style="width: 54px; height: 54px; font-size: 24px;">
                        🍲
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 bg-white h-100">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-warning-emphasis small fw-semibold text-uppercase mb-1">Pesanan Menunggu</p>
                        <h2 class="fw-bold text-warning mb-0">{{ $pesananMasuk }}</h2>
                        <small class="text-muted">Perlu segera diproses</small>
                    </div>
                    <div class="bg-warning-subtle rounded-circle d-flex align-items-center justify-content-center" style="width: 54px; height: 54px; font-size: 24px;">
                        ⏳
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card border-0 shadow-sm rounded-4 bg-white h-100">
                <div class="card-body p-4 d-flex justify-content-between align-items-center">
                    <div>
                        <p class="text-success-emphasis small fw-semibold text-uppercase mb-1">Total Omset</p>
                        <h2 class="fw-bold text-success mb-0">Rp {{ number_format($totalPendapatan, 0, ',', '.') }}</h2>
                        <small class="text-muted">Dari transaksi selesai</small>
                    </div>
                    <div class="bg-success-subtle rounded-circle d-flex align-items-center justify-content-center" style="width: 54px; height: 54px; font-size: 24px;">
                        💰
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="card-header bg-white border-0 py-3 px-4 d-flex justify-content-between align-items-center">
            <h5 class="fw-bold text-dark mb-0">Pesanan Masuk Terbaru</h5>
            <a href="{{ route('admin.orders.index') }}" class="btn btn-outline-success btn-sm rounded-3 px-3">
                Lihat Semua Pesanan &rarr;
            </a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-muted small">
                        <th class="ps-4 py-3">PEMESAN</th>
                        <th class="py-3">MENU</th>
                        <th class="py-3 text-center">PORSI</th>
                        <th class="py-3 text-end">TOTAL</th>
                        <th class="py-3 text-center">STATUS</th>
                        <th class="pe-4 py-3 text-end">WAKTU</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($recentOrders as $order)
                        <tr>
                            <td class="ps-4 fw-semibold text-dark">
                                {{ $order->user->name ?? 'User Tidak Dikenal' }}
                            </td>
                            <td>{{ $order->menu->nama_menu ?? 'Menu Dihapus' }}</td>
                            <td class="text-center">{{ $order->quantity }}</td>
                            <td class="text-end fw-semibold text-dark">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </td>
                            <td class="text-center">
                                @php
                                    $badge = [
                                        'masuk' => 'bg-warning text-dark',
                                        'diproses' => 'bg-primary text-white',
                                        'selesai' => 'bg-success text-white'
                                    ];
                                @endphp
                                <span class="badge {{ $badge[$order->status] ?? 'bg-secondary' }} px-3 py-2 rounded-pill">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>
                            <td class="pe-4 text-end text-muted small">
                                {{ $order->created_at->diffForHumans() }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="6" class="text-center py-5 text-muted">
                                Belum ada pesanan terbaru saat ini.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection