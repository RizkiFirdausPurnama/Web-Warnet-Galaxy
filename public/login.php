<?php
session_start();
if (isset($_SESSION['admin_id'])) {
    header("Location: dashboard.php");
    exit();
}

$title = 'Login - Admin Dashboard';
require_once 'templates/header.php';
?>
<head>
    <link rel="stylesheet" href="/warnetgalaxy/public/css/main.css">
</head>
<div class="container d-flex justify-content-center align-items-center min-vh-100">
    <div class="row justify-content-center w-100">
        <div class="col-md-6 col-lg-5 col-xl-4">
            <div class="card card-galaxy">
                <div class="card-header text-center">
                    <h2>Admin Login</h2>
                </div>
                <div class="card-body p-4">
                    <?php
                    if (isset($_SESSION['login_error'])): ?>
                        <div class="text-danger mb-3">
                            <?= htmlspecialchars($_SESSION['login_error']); ?>
                        </div>
                        <?php unset($_SESSION['login_error']); ?>
                    <?php endif; ?>

                    <form id="loginForm" action="login_action.php" method="POST">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email" placeholder="Email" required>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
                        </div>
                        <div class="d-grid">
                            <button type="submit" class="btn btn-galaxy">Login</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php require_once 'templates/footer.php'; ?>