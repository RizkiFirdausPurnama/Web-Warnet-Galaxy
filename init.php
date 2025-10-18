<?php
session_start();

// Muat koneksi database
require_once __DIR__ . '/config/database.php';

// Fungsi untuk memeriksa apakah user sudah login
function check_auth() {
    if (!isset($_SESSION['admin_id'])) {
        header("Location: login.php");
        exit();
    }
}
?>