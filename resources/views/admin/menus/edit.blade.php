<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Menu</title>

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
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4 p-md-5">
                    <h3 class="fw-bold text-dark mb-1">Edit Menu</h3>
                    <p class="text-muted small mb-4">Perbarui informasi menu makanan.</p>

                    <form action="{{ route('admin.menus.update', $menu->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark small">Nama Menu</label>
                            <input type="text" name="nama_menu" class="form-control rounded-3 py-2 @error('nama_menu') is-invalid @enderror" value="{{ old('nama_menu', $menu->nama_menu) }}">
                            @error('nama_menu') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark small">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control rounded-3 py-2 @error('harga') is-invalid @enderror" value="{{ old('harga', $menu->harga) }}">
                            @error('harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark small">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control rounded-3" rows="3">{{ old('deskripsi', $menu->deskripsi) }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark small">Foto Saat Ini</label><br>
                            @if($menu->foto)
                                <img src="{{ asset('storage/' . $menu->foto) }}" alt="Foto" width="100" height="100" class="rounded-3 shadow-sm mb-2" style="object-fit: cover;">
                            @else
                                <p class="text-muted small">Tidak ada foto</p>
                            @endif
                            <input type="file" name="foto" class="form-control rounded-3 py-2 @error('foto') is-invalid @enderror">
                            <small class="text-muted">Biarkan kosong jika tidak ingin mengubah foto.</small>
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-dark rounded-3 px-4 py-2 fw-semibold flex-grow-1">Update Menu</button>
                            <a href="{{ route('admin.menus.index') }}" class="btn btn-light border rounded-3 px-4 py-2 fw-semibold">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>