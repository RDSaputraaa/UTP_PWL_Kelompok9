<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <style>
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
    <div class="container min-vh-100 d-flex justify-content-center align-items-center">
        <div class="card shadow-sm border-0 p-4 w-100" style="max-width: 450px">
            <h3 class="text-center mb-2">Login</h3>
            <p class="text-center text-muted mb-4">Masuk ke akun kamu</p>

            <form action="{{ route('login.store') }}" method="POST">
                @csrf

                <div class="mb-3">
                    <label class="form-label">Email</label>
                    <input type="email" name="email"
                           class="form-control @error('email') is-invalid @enderror"
                           value="{{ old('email') }}" required>
                    @error('email')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <div class="mb-3">
                    <label class="form-label">Password</label>
                    <input type="password" name="password"
                           class="form-control" required>
                </div>

                <button type="submit" class="btn btn-theme-green w-100 py-2 fw-semibold">
                    Login
                </button>
            </form>

            <p class="text-center mt-3 mb-0">
                Belum punya akun?
                <a href="{{ route('register') }}" class="text-theme-green fw-semibold">Register</a>
            </p>
        </div>
    </div>
</body>
</html>