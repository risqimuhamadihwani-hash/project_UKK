<?php
session_start();

if (isset($_SESSION['id_user'])) {
    header("Location: login.php");
    exit;
}

$error = $_GET['error'] ?? '';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login - Sistem Informasi Penjualan Toko</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="assets/css/style.css">
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card row g-0">
            <div class="login-brand col-lg-5">
                <div>
                    <div class="brand-icon">🛒</div>
                    <h1>Sistem Informasi<br>Penjualan Toko</h1>
                    <p>Kelola transaksi penjualan dengan lebih mudah, cepat, dan terorganisir.</p>
                </div>
                <small>UKK RPL 2026/2027</small>
            </div>

            <div class="login-form col-lg-7">
                <div class="form-content">
                    <h2>Selamat Datang</h2>
                    <p class="text-muted mb-4">Silakan login untuk melanjutkan.</p>

                    <?php if ($error === 'empty'): ?>
                        <div class="alert alert-warning">Username dan password wajib diisi.</div>
                    <?php elseif ($error === 'invalid'): ?>
                        <div class="alert alert-danger">Username atau password salah.</div>
                    <?php elseif ($error === 'method'): ?>
                        <div class="alert alert-danger">Permintaan tidak valid.</div>
                    <?php endif; ?>

                    <form action="proses_login.php" method="POST">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username"
                                   name="username" placeholder="Masukkan username"
                                   autocomplete="username" required>
                        </div>

                        <div class="mb-4">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" id="password"
                                   name="password" placeholder="Masukkan password"
                                   autocomplete="current-password" required>
                        </div>

                        <button type="submit" class="btn btn-primary w-100 btn-login">
                            Login
                        </button>
                    </form>

                    <p class="login-note">Akses sesuai hak pengguna: Admin, Kasir, atau Pemilik Toko.</p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
