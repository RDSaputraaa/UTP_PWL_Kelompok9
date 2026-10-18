@extends('layouts.navbar_user')

@section('title', 'Pesan ' . $menu->nama_menu . ' | warungkita')

@section('content')
<div class="container py-4" style="max-width: 1000px;">
    <a href="{{ route('user.catalog') }}" class="text-decoration-none wk-link small">&larr; Kembali ke menu</a>

    <div class="row g-4 mt-1">
        <div class="col-lg-5">
            <div class="wk-card overflow-hidden h-100">
                @if($menu->foto)
                    <img src="{{ asset('storage/' . $menu->foto) }}" alt="{{ $menu->nama_menu }}"
                         class="w-100" style="height: 280px; object-fit: cover;">
                @else
                    <div class="d-flex align-items-center justify-content-center bg-light wk-muted" style="height: 280px;">
                        Tidak ada foto
                    </div>
                @endif
                <div class="p-4">
                    <h3 class="fw-bold mb-1">{{ $menu->nama_menu }}</h3>
                    <p class="fs-5 fw-bold mb-2" style="color: var(--wk-green);">
                        Rp {{ number_format($menu->harga, 0, ',', '.') }} <span class="fs-6 fw-normal wk-muted">/ porsi</span>
                    </p>
                    <p class="wk-muted mb-0">{{ $menu->deskripsi ?: 'Belum ada deskripsi untuk menu ini.' }}</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7">
            <div class="wk-card p-4 p-md-5">
                <h4 class="fw-bold mb-1">Pesan dulu, ambil nanti</h4>
                <p class="wk-muted mb-4">Atur jumlah porsi, lalu kirim pesananmu ke penjual.</p>

                <form action="{{ route('user.orders.store') }}" method="POST" novalidate>
                    @csrf
                    <input type="hidden" name="menu_id" value="{{ $menu->id }}">

                    @error('menu_id')
                        <div class="alert alert-danger border-0 rounded-3">{{ $message }}</div>
                    @enderror

                    <div class="mb-4">
                        <label for="quantity" class="form-label fw-semibold">Jumlah porsi</label>
                        <div class="input-group" style="max-width: 190px;">
                            <button class="btn btn-outline-secondary" type="button" data-step="-1" aria-label="Kurangi porsi">&minus;</button>
                            <input type="number" id="quantity" name="quantity"
                                   class="form-control text-center @error('quantity') is-invalid @enderror"
                                   value="{{ old('quantity', 1) }}" min="1" max="{{ $maxQuantity }}" required>
                            <button class="btn btn-outline-secondary" type="button" data-step="1" aria-label="Tambah porsi">+</button>
                            @error('quantity')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-text">Maksimal {{ $maxQuantity }} porsi per pesanan.</div>
                    </div>

                    <div class="mb-4">
                        <label for="notes" class="form-label fw-semibold">Catatan untuk penjual <span class="fw-normal wk-muted">(opsional)</span></label>
                        <textarea id="notes" name="notes" rows="3" maxlength="255"
                                  class="form-control @error('notes') is-invalid @enderror"
                                  placeholder="Contoh: tidak pakai sambal, telur dimasak matang">{{ old('notes') }}</textarea>
                        @error('notes')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="d-flex justify-content-between align-items-center rounded-3 p-3 mb-4"
                         style="background: var(--wk-green-soft);">
                        <span class="fw-semibold">Total harga</span>
                        <span class="fs-4 fw-bold" style="color: var(--wk-green);" id="total">
                            Rp {{ number_format($menu->harga * (int) old('quantity', 1), 0, ',', '.') }}
                        </span>
                    </div>

                    <button type="submit" class="btn btn-wk btn-lg w-100 rounded-3">Kirim pesanan</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
    (function () {
        const price = Number("{{ (int) $menu->harga }}");
        const max = Number("{{ (int) $maxQuantity }}");
        const qty = document.getElementById('quantity');
        const total = document.getElementById('total');

        function clamp(n) {
            n = parseInt(n, 10);
            if (isNaN(n) || n < 1) return 1;
            return Math.min(n, max);
        }

        function render() {
            total.textContent = 'Rp ' + (price * clamp(qty.value)).toLocaleString('id-ID');
        }

        document.querySelectorAll('[data-step]').forEach(function (btn) {
            btn.addEventListener('click', function () {
                qty.value = clamp(clamp(qty.value) + parseInt(btn.dataset.step, 10));
                render();
            });
        });

        qty.addEventListener('input', render);
        qty.addEventListener('blur', function () { qty.value = clamp(qty.value); render(); });
    })();
</script>
@endpush
