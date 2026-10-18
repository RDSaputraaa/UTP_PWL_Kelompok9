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
                <h4 id="recommended-menus-title" class="mb-1">Menu Rekomendasi</h4>
                <p class="text-muted mb-0">Pilihan menu dari penjual untuk kamu.</p>
            </div>
            <a href="{{ route('user.catalog') }}" class="link-success text-decoration-none">Lihat semua menu</a>
        </div>

        <div class="row g-3">
            @forelse ($recommendedMenus as $menu)
                <div class="col-12 col-sm-6 col-lg-4 col-xl-3">
                    <article class="card h-100 border-0 shadow-sm overflow-hidden">
                        @if ($menu->foto)
                            <img src="{{ asset('storage/' . $menu->foto) }}" class="card-img-top"
                                 alt="{{ $menu->nama_menu }}" style="height: 190px; object-fit: cover;">
                        @else
                            <div class="bg-success-subtle text-success d-flex align-items-center justify-content-center"
                                 role="img" aria-label="Foto {{ $menu->nama_menu }} tidak tersedia"
                                 style="height: 190px;">
                                <span class="fw-semibold">Menu pilihan</span>
                            </div>
                        @endif
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title mb-2">{{ $menu->nama_menu }}</h5>
                            <p class="card-text text-muted small flex-grow-1">
                                {{ $menu->deskripsi ?: 'Menu pilihan dari penjual.' }}
                            </p>
                            <div class="d-flex justify-content-between align-items-center gap-2 mt-2">
                                <strong class="text-success">Rp {{ number_format($menu->harga, 0, ',', '.') }}</strong>
                                <a href="{{ route('user.orders.create', $menu) }}" class="btn btn-success btn-sm">
                                    Pesan
                                </a>
                            </div>
                        </div>
                    </article>
                </div>
            @empty
                <div class="col-12">
                    <p class="text-muted mb-0">Belum ada menu rekomendasi.</p>
                </div>
            @endforelse
        </div>
    </section>
</div>
@endsection