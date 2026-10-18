@extends('layouts.navbar_admin')

@section('title', 'Kelola Pesanan - UTP PWL')

@section('content')
<div class="container pb-5">
    <div class="row mb-4">
        <div class="col-12">
            <h2 class="fw-bold text-dark">Daftar Pesanan Masuk</h2>
            <p class="text-muted">
                Kelola status dan data pesanan pre-order kuliner lokal.
            </p>
        </div>
    </div>

    @if (session('success'))
        <div class="alert alert-success border-0 shadow-sm rounded-3 alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger border-0 shadow-sm rounded-3 alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white mb-4">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-muted small">
                        <th class="ps-4 py-3">NO</th>
                        <th class="py-3">NAMA PEMESAN</th>
                        <th class="py-3">MENU</th>
                        <th class="py-3 text-center">PORSI</th>
                        <th class="py-3 text-end">TOTAL HARGA</th>
                        <th class="py-3 text-center">STATUS</th>
                        <th class="pe-4 py-3 text-end">AKSI</th>
                    </tr>
                </thead>

                <tbody>
                    @forelse ($orders as $key => $order)
                        <tr>
                            <td class="ps-4 fw-semibold text-muted">{{ $orders->firstItem() + $key }}</td>
                            <td class="fw-semibold text-dark">{{ $order->user->name ?? 'User Tidak Dikenal' }}</td>
                            <td>{{ $order->menu->nama_menu ?? 'Menu Dihapus' }}</td>
                            <td class="text-center">{{ $order->quantity }}</td>
                            <td class="text-end fw-bold text-success">
                                Rp {{ number_format($order->total_price, 0, ',', '.') }}
                            </td>

                            <td class="text-center">
                                @php
                                    $badgeColors = [
                                        'masuk' => 'bg-warning text-dark',
                                        'diproses' => 'bg-primary text-white',
                                        'selesai' => 'bg-success text-white'
                                    ];
                                @endphp

                                <span class="badge {{ $badgeColors[$order->status] ?? 'bg-secondary' }} px-3 py-2 rounded-pill">
                                    {{ ucfirst($order->status) }}
                                </span>
                            </td>

                            <td class="text-end pe-4">
                                <div class="d-flex align-items-center justify-content-end gap-2">
                                    <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                          method="POST">
                                        @csrf
                                        @method('PATCH')

                                        <select name="status"
                                                class="form-select form-select-sm rounded-3"
                                                onchange="this.form.submit()">
                                            <option value="masuk" {{ $order->status == 'masuk' ? 'selected' : '' }}>
                                                Masuk
                                            </option>
                                            <option value="diproses" {{ $order->status == 'diproses' ? 'selected' : '' }}>
                                                Diproses
                                            </option>
                                            <option value="selesai" {{ $order->status == 'selesai' ? 'selected' : '' }}>
                                                Selesai
                                            </option>
                                        </select>
                                    </form>

                                    <form action="{{ route('admin.orders.destroy', $order->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin ingin menghapus pesanan ini?')">
                                        @csrf
                                        @method('DELETE')

                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-3 px-3">
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-5">
                                Belum ada data pesanan yang masuk.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

    <div class="d-flex justify-content-end">
        {{ $orders->links('pagination::bootstrap-5') }}
    </div>
</div>
@endsection