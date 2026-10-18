<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Register | Kuliner Lokal</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
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
        .text-theme-green {
            color: #0f8a5f;
            text-decoration: none;
        }
        .text-theme-green:hover {
            color: #0c6f4d;
        }
    </style>
</head>
<body class="bg-light">
    <div class="container min-vh-100 d-flex justify-content-center align-items-center py-2">
        <div class="card shadow-sm border-0 p-3 p-md-4 w-100 rounded-4" style="max-width: 420px;">
            <h4 class="text-center fw-bold mb-1">Buat Akun</h4>
            <p class="text-center text-muted small mb-3">Daftar untuk memulai</p>

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <div class="mb-2">
                    <label class="form-label small fw-semibold mb-1">Nama</label>
                    <input type="text" name="name"
                           class="form-control form-control-sm py-2 @error('name') is-invalid @enderror"
                           value="{{ old('name') }}" required>
                    @error('name')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label small fw-semibold mb-1">Email</label>
                    <input type="email" name="email"
                           class="form-control form-control-sm py-2 @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-2">
                    <label class="form-label small fw-semibold mb-1">Password</label>
                    <input type="password" name="password"
                           class="form-control form-control-sm py-2 @error('password') is-invalid @enderror"
                           required>
                    @error('password')
                        <div class="invalid-feedback small">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label small fw-semibold mb-1">Konfirmasi Password</label>
                    <input type="password" name="password_confirmation"
                           class="form-control form-control-sm py-2" required>
                </div>

                <button type="submit" class="btn btn-theme-green w-100 py-2 fw-semibold rounded-3">
                    Register
                </button>
            </form>

            <p class="text-center mt-3 mb-0 small text-muted">
                Sudah punya akun?
                <a href="{{ route('login') }}" class="text-theme-green fw-semibold">Login</a>
            </p>
        </div>
    </div>
</body>
</html>