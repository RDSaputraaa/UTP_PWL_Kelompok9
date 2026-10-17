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
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger alert-dismissible fade show" role="alert">
            {{ session('error') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Nama Pemesan</th>
                            <th>Menu</th>
                            <th>Jumlah</th>
                            <th>Total Harga</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>

                    <tbody>
                        @forelse ($orders as $key => $order)
                            <tr>
                                <td>{{ $orders->firstItem() + $key }}</td>
                                <td>{{ $order->user->name ?? 'User Tidak Dikenal' }}</td>
                                <td>{{ $order->menu->name ?? 'Menu Dihapus' }}</td>
                                <td>{{ $order->quantity }}</td>
                                <td>
                                    Rp {{ number_format($order->total_price, 0, ',', '.') }}
                                </td>

                                <td>
                                    @php
                                        $badgeColors = [
                                            'masuk' => 'bg-warning text-dark',
                                            'diproses' => 'bg-secondary',
                                            'selesai' => 'bg-dark'
                                        ];
                                    @endphp

                                    <span class="badge {{ $badgeColors[$order->status] ?? 'bg-secondary' }}">
                                        {{ ucfirst($order->status) }}
                                    </span>
                                </td>

                                <td>
                                    <div class="d-flex align-items-center gap-2">
                                        <form action="{{ route('admin.orders.updateStatus', $order->id) }}"
                                              method="POST">
                                            @csrf
                                            @method('PATCH')

                                            <select name="status"
                                                    class="form-select form-select-sm"
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

                                            <button type="submit" class="btn btn-dark btn-sm">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted py-4">
                                    Belum ada data pesanan yang masuk.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="d-flex justify-content-end mt-3">
                {{ $orders->links() }}
            </div>
        </div>
    </div>
</div>
@endsection