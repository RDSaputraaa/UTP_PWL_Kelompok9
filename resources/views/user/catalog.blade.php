@extends('layouts.navbar_user')

@section('content')
<div class="container py-5">
    <div class="row mb-5">
        <div class="col-12 text-center">
            <h2 class="fw-bold text-dark">Katalog Menu Kami</h2>
            <p class="text-muted">
                Pilih menu favoritmu dan lakukan pre-order sekarang juga!
            </p>
        </div>
    </div>

    <div class="row">
        @forelse ($menus as $menu)
            <div class="col-md-4 mb-4">
                <div class="card h-100 border-0 shadow-sm rounded-4 overflow-hidden bg-white">
                    @if ($menu->foto)
                        <img
                            src="{{ asset('storage/' . $menu->foto) }}"
                            class="card-img-top"
                            alt="{{ $menu->nama_menu }}"
                            style="height: 220px; object-fit: cover;"
                        >
                    @else
                        <div class="bg-light text-muted d-flex align-items-center justify-content-center"
                             style="height: 220px;">
                            Tidak ada foto
                        </div>
                    @endif

                    <div class="card-body d-flex flex-column p-4">
                        <h5 class="card-title fw-bold text-dark mb-1">
                            {{ $menu->nama_menu }}
                        </h5>

                        <p class="text-dark fw-bold fs-5 mb-2">
                            Rp {{ number_format($menu->harga, 0, ',', '.') }}
                        </p>

                        <p class="text-muted small mb-4">
                            {{ $menu->deskripsi }}
                        </p>

                        <div class="mt-auto">
                                     <a href="{{ route('user.orders.create', $menu) }}"
                               class="btn btn-dark w-100 rounded-3 py-2 fw-semibold">
                                Pesan / Pre-Order
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @empty
            <div class="col-12 text-center py-5">
                <p class="text-muted">
                    Belum ada menu yang tersedia saat ini.
                </p>
            </div>
        @endforelse
    </div>
</div>
@endsection