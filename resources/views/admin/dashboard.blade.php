@extends('layouts.navbar_admin')

@section('title', 'Dashboard Admin - UTP PWL')

@section('content')
<div class="container pb-5">
    <div class="row mb-4">
        <div class="col-md-12">
            <div class="p-4 bg-white rounded-3 shadow-sm border">
                <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                    <div>
                        <h3 class="fw-bold text-dark mb-1">Selamat datang, Admin!</h3>
                        <p class="text-muted mb-0">
                            Kelola menu kuliner lokal dan pantau pesanan masuk dari pelanggan dengan mudah melalui panel ini.
                        </p>
                    </div>
                    <span class="badge bg-dark fs-6 px-3 py-2">
                        Role: Administrator
                    </span>
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
                        <p class="card-text text-muted mb-4">
                            Tambah, ubah, atau hapus daftar menu kuliner pre-order yang tersedia untuk pengguna.
                        </p>
                    </div>
                    <a href="{{ route('admin.menus.index') }}" class="btn btn-dark w-100 py-2">
                        Buka Menu
                    </a>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card shadow-sm h-100 border-0">
                <div class="card-body d-flex flex-column justify-content-between p-4">
                    <div>
                        <h4 class="card-title fw-bold text-dark mb-3">Kelola Pesanan</h4>
                        <p class="card-text text-muted mb-4">
                            Pantau daftar pesanan masuk, perbarui status pesanan, dan kelola data transaksi.
                        </p>
                    </div>
                    <a href="{{ route('admin.orders.index') }}" class="btn btn-dark w-100 py-2">
                        Buka Kelola Pesanan
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection