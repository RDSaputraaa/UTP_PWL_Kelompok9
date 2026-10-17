@extends('layouts.navbar_user')

@section('content')
    <div class="container py-4" style="max-width: 1200px;">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-end gap-3 mb-4">
            <div>
                <h2 class="fw-bold mb-1">Pesanan Saya</h2>
                <p class="wk-muted mb-0">Pesanan bisa dibatalkan selama statusnya masih Masuk.</p>
            </div>
            <a href="{{ route('user.catalog') }}" class="btn btn-wk rounded-3 px-4">Pesan menu lain</a>
        </div>

    @php
        $badge = [
            'masuk'    => ['bg-warning-subtle text-warning-emphasis', 'Masuk'],
            'diproses' => ['bg-info-subtle text-info-emphasis', 'Diproses'],
            'selesai'  => ['bg-success-subtle text-success-emphasis', 'Selesai'],
        ];
    @endphp

    @if($orders->isEmpty())
        <div class="wk-card text-center py-5 px-3">
            <h5 class="fw-bold mb-2">Kamu belum punya pesanan</h5>
            <p class="wk-muted mb-4">Pilih menu dari warung terdekat, pesananmu akan muncul di sini.</p>
            <a href="{{ route('user.catalog') }}" class="btn btn-wk rounded-3 px-4">Lihat menu makanan</a>
        </div>
    @else
        <div class="wk-card overflow-hidden">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="wk-muted small">
                            <th class="ps-4 py-3">No</th>
                            <th class="py-3">Menu</th>
                            <th class="py-3 text-center">Porsi</th>
                            <th class="py-3 text-end">Total</th>
                            <th class="py-3">Status</th>
                            <th class="py-3">Dipesan</th>
                            <th class="py-3 text-end pe-4">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($orders as $order)
                            @php
                                [$badgeClass, $badgeLabel] = $badge[$order->status] ?? ['bg-secondary-subtle text-secondary-emphasis', ucfirst($order->status)];
                            @endphp
                            <tr>
                                <td class="ps-4 wk-muted">{{ $orders->firstItem() + $loop->index }}</td>
                                <td>
                                    <div class="d-flex align-items-center gap-3">
                                        @if($order->menu && $order->menu->foto)
                                            <img src="{{ asset('storage/' . $order->menu->foto) }}" alt=""
                                                 width="52" height="52" class="rounded-3" style="object-fit: cover;">
                                        @else
                                            <div class="bg-light rounded-3" style="width: 52px; height: 52px;"></div>
                                        @endif
                                        <div>
                                            <div class="fw-semibold">{{ $order->menu->nama_menu ?? 'Menu sudah dihapus' }}</div>
                                            @if($order->notes)
                                                <div class="small wk-muted">Catatan: {{ $order->notes }}</div>
                                            @endif
                                        </div>
                                    </div>
                                </td>
                                <td class="text-center">{{ $order->quantity }}</td>
                                <td class="text-end fw-semibold">Rp {{ number_format($order->total_price, 0, ',', '.') }}</td>
                                <td><span class="badge rounded-pill px-3 py-2 {{ $badgeClass }}">{{ $badgeLabel }}</span></td>
                                <td class="small wk-muted">{{ $order->created_at->timezone('Asia/Jakarta')->format('d M Y, H:i') }}</td>
                                <td class="text-end pe-4">
                                    @if(in_array($order->status, $cancellable, true))
                                        <form action="{{ route('user.orders.destroy', $order) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Batalkan pesanan ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-outline-danger btn-sm rounded-3 px-3">Batalkan</button>
                                        </form>
                                    @else
                                        <span class="small wk-muted">Tidak bisa dibatalkan</span>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <div class="d-flex justify-content-end mt-3">
            {{ $orders->links('pagination::bootstrap-5') }}
        </div>
    <div>
    @endif
@endsection
