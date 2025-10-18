<aside class="sidebar">
    <div class="sidebar-header">
        <h3>Warnet Galaxy</h3>
    </div>
    <ul class="nav flex-column">
        <li class="nav-item">
            <a class="nav-link <?= ($active_page == 'dashboard') ? 'active' : '' ?>" href="dashboard.php">
                <i class="bi bi-grid-fill me-2"></i> Dashboard
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?= ($active_page == 'biodata') ? 'active' : '' ?>" href="biodata.php">
                <i class="bi bi-people-fill me-2"></i> Data Pelanggan
            </a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="logout.php">
                <i class="bi bi-box-arrow-left me-2"></i> Logout
            </a>
        </li>
    </ul>
</aside>