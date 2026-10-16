<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manajemen Menu - Admin</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }
    </style>
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white shadow-sm py-3 mb-5">
        <div class="container">
            <a class="navbar-brand fw-bold text-dark" href="#">Panel Admin</a>
            <div class="navbar-nav ms-auto d-flex flex-row gap-3">
                <a class="nav-link fw-semibold text-muted" href="{{ route('user.catalog') }}">Lihat Katalog User</a>
                <a class="nav-link active fw-semibold text-dark" href="{{ route('admin.menus.index') }}">Kelola Menu</a>
            </div>
        </div>
    </nav>

    <div class="container pb-5">
        <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center mb-4 gap-3">
            <div>
                <h3 class="fw-bold text-dark mb-1">Manajemen Menu Makanan</h3>
                <p class="text-muted small mb-0">Kelola daftar menu yang ditampilkan di katalog pembeli.</p>
            </div>
            <a href="{{ route('admin.menus.create') }}" class="btn btn-dark rounded-3 px-4 py-2 fw-semibold">
                + Tambah Menu Baru
            </a>
        </div>
        
        @if(session('success'))
            <div class="alert alert-success border-0 shadow-sm rounded-3 mb-4">
                {{ session('success') }}
            </div>
        @endif

        <div class="card border-0 shadow-sm rounded-4 overflow-hidden bg-white">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="table-light">
                        <tr class="text-muted small">
                            <th class="ps-4 py-3">NO</th>
                            <th class="py-3">FOTO</th>
                            <th class="py-3">NAMA MENU</th>
                            <th class="py-3">HARGA</th>
                            <th class="py-3">DESKRIPSI</th>
                            <th class="text-end pe-4 py-3">AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($menus as $menu)
                            <tr>
                                <td class="ps-4 fw-semibold text-muted">{{ $loop->iteration }}</td>
                                <td>
                                    @if($menu->foto)
                                        <img src="{{ asset('storage/' . $menu->foto) }}" alt="Foto Menu" width="60" height="60" class="rounded-3" style="object-fit: cover;">
                                    @else
                                        <div class="bg-light text-muted d-flex align-items-center justify-content-center rounded-3" style="width: 60px; height: 60px;">
                                            <small style="font-size: 10px;">No image</small>
                                        </div>
                                    @endif
                                </td>
                                <td class="fw-bold text-dark">{{ $menu->nama_menu }}</td>
                                <td class="fw-bold text-dark">Rp {{ number_format($menu->harga, 0, ',', '.') }}</td>
                                <td class="text-muted small">{{ Str::limit($menu->deskripsi, 50) }}</td>
                                <td class="text-end pe-4">
                                    <a href="{{ route('admin.menus.edit', $menu->id) }}" class="btn btn-outline-dark btn-sm rounded-3 px-3 me-1 fw-medium">
                                        Edit
                                    </a>
                                    <form action="{{ route('admin.menus.destroy', $menu->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus menu ini?')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-outline-danger btn-sm rounded-3 px-3 fw-medium">
                                            Hapus
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-5 text-muted">Belum ada data menu. Silakan klik tombol Tambah Menu Baru.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>