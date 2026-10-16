<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="bg-light p-5">
    <div class="container">
        <h2>Selamat Datang di Dashboard!</h2>
        <p>Silakan akses fitur manajemen pesanan admin melalui link di bawah:</p>
        <a href="{{ route('admin.orders.index') }}" class="btn btn-primary">Kelola Pesanan Admin</a>
    </div>
</body>
</html>