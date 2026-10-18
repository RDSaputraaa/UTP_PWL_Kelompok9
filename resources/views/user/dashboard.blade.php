@extends('layouts.navbar_user')

@section('title', 'Dashboard User')

@section('content')
<div class="container py-5">
    <div class="card border-0 shadow-sm p-4">
        <h3>Selamat datang, {{ auth()->user()->name }}!</h3>

        <p class="text-muted mb-2">
            Kamu berhasil login sebagai User.
        </p>

        <span class="badge bg-success align-self-start">
            Pengguna
        </span>
    </div>

        <section class="mt-5" aria-labelledby="recommended-menus-title">
        <div class="d-flex flex-column flex-sm-row justify-content-between align-items-sm-end gap-2 mb-3">
            <div>
                <h4 id="recommended-menus-title" class="fw-bold mb-1">Menu Rekomendasi Terpopuler 🔥</h4>
                <p class="text-muted mb-0">Menu favorit pilihan pelanggan untuk kamu.</p>
            </div>
            <a href="{{ route('user.catalog') }}" class="link-success fw-semibold text-decoration-none">
                Lihat semua menu &rarr;
            </a>
        </div>

        <div class="row g-4">
            @forelse ($recommendedMenus as $menu)
                <div class="col-12 col-md-4">
                    <article class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                        @if ($menu->foto)
                            <img src="{{ asset('storage/' . $menu->foto) }}" class="card-img-top"
                                 alt="{{ $menu->nama_menu }}" style="height: 200px; object-fit: cover;">
                        @else
                            <div class="bg-success-subtle text-success d-flex align-items-center justify-content-center"
                                 style="height: 200px;">
                                <span class="fw-semibold">Foto belum tersedia</span>
                            </div>
                        @endif

                        <div class="card-body d-flex flex-column p-4">
                            <div class="d-flex justify-content-between align-items-start mb-2">
                                <h5 class="card-title fw-bold text-dark mb-0">{{ $menu->nama_menu }}</h5>
                                @if($menu->orders_count > 0)
                                    <span class="badge bg-warning text-dark rounded-pill small">⭐ Terlaris</span>
                                @endif
                            </div>

                            <p class="card-text text-muted small flex-grow-1 mb-3">
                                {{ Str::limit($menu->deskripsi ?: 'Menu lezat siap dipesan.', 60) }}
                            </p>

                            <div class="d-flex justify-content-between align-items-center pt-2 border-top">
                                <span class="fw-bold text-success fs-5">
                                    Rp {{ number_format($menu->harga, 0, ',', '.') }}
                                </span>
                                <a href="{{ route('user.orders.create', $menu) }}" class="btn btn-success rounded-3 px-3 py-1 fw-semibold">
                                    Pesan
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12 text-center py-5">
                    <p class="text-muted mb-0">Belum ada menu yang tersedia saat ini.</p>
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection