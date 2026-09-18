<?php
session_start();
require_once "config/database.php";

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php?error=method");
    exit;
}

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    header("Location: login.php?error=empty");
    exit;
}

$stmt = mysqli_prepare(
    $conn,
    "SELECT id_user, nama, username, password, role
     FROM users
     WHERE username = ?
     LIMIT 1"
);

mysqli_stmt_bind_param($stmt, "s", $username);
mysqli_stmt_execute($stmt);

$result = mysqli_stmt_get_result($stmt);
$user = mysqli_fetch_assoc($result);

if ($user && password_verify($password, $user['password'])) {
    session_regenerate_id(true);

    $_SESSION['id_user'] = $user['id_user'];
    $_SESSION['nama']    = $user['nama'];
    $_SESSION['username'] = $user['username'];
    $_SESSION['role']    = $user['role'];

    // Sementara tetap di halaman login karena project baru dibuat sampai login.
    // Nanti bagian ini dapat diarahkan ke dashboard sesuai role.
    header("Location: login.php");
    exit;
}

header("Location: login.php?error=invalid");
exit;
?>
