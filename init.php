<?php
session_start();

require_once __DIR__ . '/config/database.php';

function check_auth() {
    if (!isset($_SESSION['admin_id'])) {
        header("Location: login.php");
        exit();
    }
}
?>