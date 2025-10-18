<?php
require_once __DIR__ . '/../init.php';
check_auth(); // Cek apakah sudah login

$title = 'Dashboard - Warnet Galaxy';
$css_file = 'dashboard.css';
$active_page = 'dashboard';
require_once 'templates/header.php';
require_once 'templates/sidebar.php';
?>

<main class="main-content">
    <h1 class="mb-4" style="color: #fff;">Dashboard</h1>
    <div class="row">
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="stat-card card-galaxy h-100" style="border-left: 5px solid #00aaff;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs fw-bold text-primary text-uppercase mb-1">Pelanggan Hari Ini</div>
                        <div class="h3 mb-0 fw-bold">12</div>
                    </div>
                    <i class="bi bi-person-check-fill h1 text-gray-300"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="stat-card card-galaxy h-100" style="border-left: 5px solid #ffc107;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs fw-bold text-warning text-uppercase mb-1">PC Tersedia</div>
                        <div class="h3 mb-0 fw-bold">8 / 20</div>
                    </div>
                    <i class="bi bi-display-fill h1 text-gray-300"></i>
                </div>
            </div>
        </div>
        <div class="col-xl-4 col-md-6 mb-4">
            <div class="stat-card card-galaxy h-100" style="border-left: 5px solid #dc3545;">
                <div class="card-body d-flex justify-content-between align-items-center">
                    <div>
                        <div class="text-xs fw-bold text-danger text-uppercase mb-1">Pendapatan Hari Ini</div>
                        <div class="h3 mb-0 fw-bold">Rp 250.000</div>
                    </div>
                    <i class="bi bi-cash-stack h1 text-gray-300"></i>
                </div>
            </div>
        </div>
    </div>
</main>

<?php require_once 'templates/footer.php'; ?>