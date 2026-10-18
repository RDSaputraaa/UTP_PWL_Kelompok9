<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Menu Baru</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #f8fafc;
        }
        .btn-theme-green {
            background-color: #0f8a5f;
            color: #ffffff;
            border: none;
        }
        .btn-theme-green:hover {
            background-color: #0c6f4d;
            color: #ffffff;
        }
    </style>
</head>
<body>
    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-md-7 col-lg-6">
                <div class="card border-0 shadow-sm rounded-4 bg-white p-4 p-md-5">
                    <h3 class="fw-bold text-dark mb-1">Tambah Menu Baru</h3>
                    <p class="text-muted small mb-4">Isi detail informasi makanan atau minuman yang ingin ditambahkan.</p>

                    <form action="{{ route('admin.menus.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark small">Nama Menu</label>
                            <input type="text" name="nama_menu" class="form-control rounded-3 py-2 @error('nama_menu') is-invalid @enderror" placeholder="Contoh: Nasi Goreng Spesial" value="{{ old('nama_menu') }}">
                            @error('nama_menu') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark small">Harga (Rp)</label>
                            <input type="number" name="harga" class="form-control rounded-3 py-2 @error('harga') is-invalid @enderror" placeholder="Contoh: 25000" value="{{ old('harga') }}">
                            @error('harga') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label fw-semibold text-dark small">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control rounded-3" rows="3" placeholder="Jelaskan porsi, rasa, atau bahan menu...">{{ old('deskripsi') }}</textarea>
                        </div>

                        <div class="mb-4">
                            <label class="form-label fw-semibold text-dark small">Foto Makanan</label>
                            <input type="file" name="foto" class="form-control rounded-3 py-2 @error('foto') is-invalid @enderror">
                            @error('foto') <div class="invalid-feedback">{{ $message }}</div> @enderror
                        </div>

                        <div class="form-check mb-4">
                            <input type="checkbox" name="is_recommended" value="1" id="is_recommended"
                                   class="form-check-input" @checked(old('is_recommended'))>
                            <label for="is_recommended" class="form-check-label fw-semibold text-dark small">
                                Tampilkan sebagai menu rekomendasi di dashboard user
                            </label>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-theme-green rounded-3 px-4 py-2 fw-semibold flex-grow-1">Simpan Menu</button>
                            <a href="{{ route('admin.menus.index') }}" class="btn btn-light border rounded-3 px-4 py-2 fw-semibold">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
</html>