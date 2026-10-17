<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'warungkita')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Plus+Jakarta+Sans:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

    <style>
        :root {
            --wk-green: #1f4a38;
            --wk-green-dark: #173a2c;
            --wk-green-soft: #e8f0ec;
            --wk-ink: #1b2a23;
            --wk-line: #e5e9e6;
        }
        body {
            font-family: 'Plus Jakarta Sans', sans-serif;
            background-color: #fff;
            color: var(--wk-ink);
        }
        .wk-nav { border-bottom: 1px solid var(--wk-line); }
        .wk-logo {
            width: 40px; height: 40px; border-radius: 50%;
            background: var(--wk-green); color: #fff;
            display: inline-flex; align-items: center; justify-content: center;
            font-weight: 800; margin-right: .6rem;
        }
        .wk-brand { font-weight: 700; font-size: 1.5rem; color: var(--wk-green); letter-spacing: -.02em; }
        .wk-brand span { font-weight: 500; }
        .wk-link { color: #5b6b63; font-weight: 500; }
        .wk-link:hover, .wk-link.active { color: var(--wk-green); }
        .wk-link.active { font-weight: 700; }

        .btn-wk {
            background: var(--wk-green); border-color: var(--wk-green); color: #fff; font-weight: 600;
        }
        .btn-wk:hover, .btn-wk:focus-visible {
            background: var(--wk-green-dark); border-color: var(--wk-green-dark); color: #fff;
        }
        .btn-outline-wk {
            border-color: var(--wk-green); color: var(--wk-green); font-weight: 600;
        }
        .btn-outline-wk:hover { background: var(--wk-green); color: #fff; }
        .form-control:focus {
            border-color: var(--wk-green);
            box-shadow: 0 0 0 .2rem rgba(31, 74, 56, .15);
        }
        .wk-card { border: 1px solid var(--wk-line); border-radius: 1rem; background: #fff; }
        .wk-muted { color: #6b7a72; }
    </style>
    @stack('styles')
</head>
<body>

    <nav class="navbar navbar-expand-lg bg-white wk-nav py-3">
    </nav>

    <main class="container py-5">
        @if(session('success'))
            <div class="alert alert-success border-0 rounded-3 alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif
        @if(session('error'))
            <div class="alert alert-danger border-0 rounded-3 alert-dismissible fade show" role="alert">
                {{ session('error') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Tutup"></button>
            </div>
        @endif

        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>
