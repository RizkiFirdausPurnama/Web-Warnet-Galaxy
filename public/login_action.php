<?php
session_start();

require_once __DIR__ . '/../init.php';

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: login.php");
    exit();
}

$email = isset($_POST['email']) ? trim($_POST['email']) : '';
$password = isset($_POST['password']) ? trim($_POST['password']) : '';

if ($email === '' || $password === '') {
    $_SESSION['login_error'] = "Email dan password wajib diisi.";
    header("Location: login.php");
    exit();
}

try {
    $stmt = $pdo->prepare("SELECT * FROM admins WHERE email = ?");
    $stmt->execute([$email]);
    $admin = $stmt->fetch(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $_SESSION['login_error'] = "Terjadi kesalahan. Coba lagi.";
    header("Location: login.php");
    exit();
}

if ($admin && $password === $admin['password']) {

    $_SESSION['admin_id'] = $admin['id'];
    $_SESSION['admin_email'] = $admin['email'];

    header("Location: dashboard.php");
    exit();
} else {
    $_SESSION['login_error'] = "Email atau password salah.";
    header("Location: login.php");
    exit();
}