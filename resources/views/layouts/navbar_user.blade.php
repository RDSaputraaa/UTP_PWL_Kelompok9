<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title', 'Dashboard User')</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">
    <style>
        :root {
            --wk-green: #198754;
            --wk-green-dark: #157347;
            --wk-green-soft: #e8f5e9;
            --wk-ink: #1b2a23;
            --wk-line: #e5e9e6;
        }
        .btn-wk {
            background-color: var(--wk-green);
            border-color: var(--wk-green);
            color: #fff;
            font-weight: 600;
        }
        .btn-wk:hover, .btn-wk:focus-visible {
            background-color: var(--wk-green-dark);
            border-color: var(--wk-green-dark);
            color: #fff;
        }
        .btn-outline-wk {
            border-color: var(--wk-green);
            color: var(--wk-green);
            font-weight: 600;
        }
        .btn-outline-wk:hover {
            background-color: var(--wk-green);
            color: #fff;
        }
        .wk-card {
            border: 1px solid var(--wk-line);
            border-radius: 1rem;
            background: #fff;
        }
        .wk-muted {
            color: #6b7a72;
        }
        .wk-link {
            color: #5b6b63;
            font-weight: 500;
        }
        .wk-link:hover, .wk-link.active {
            color: var(--wk-green);
        }
    </style>
    @stack('styles')
</head>
<body class="bg-light">

    <nav class="navbar navbar-expand-lg navbar-dark bg-success mb-4 shadow-sm">
        <div class="container">
            <a class="navbar-brand" href="{{ route('user.dashboard') }}">
                Kelompok 9
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbarNav" aria-controls="navbarNav"
                    aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse justify-content-between" id="navbarNav">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.dashboard') }}">
                            Dashboard
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.catalog') }}">
                            Catalog
                        </a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('user.orders.index') }}">
                            Riwayat
                        </a>
                    </li>
                </ul>

                <form method="POST" action="{{ route('logout') }}" class="d-flex">
                    @csrf
                    <button type="submit" class="btn btn-outline-light btn-sm">
                        Logout
                    </button>
                </form>
            </div>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
    @stack('scripts')
</body>
</html>