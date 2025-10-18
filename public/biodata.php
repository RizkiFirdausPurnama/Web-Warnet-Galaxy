<?php
require_once __DIR__ . '/../init.php';
check_auth();

// Ambil semua data pelanggan dari database
$stmt = $pdo->query("SELECT * FROM pelanggan ORDER BY id DESC");
$pelanggan = $stmt->fetchAll(PDO::FETCH_ASSOC);

$title = 'Data Pelanggan - Warnet Galaxy';
$css_file = 'biodata.css';
$active_page = 'biodata';
require_once 'templates/header.php';
require_once 'templates/sidebar.php';
?>

<main class="main-content">
    <div class="card card-galaxy">
         <div class="card-header">
             <h3>Manajemen Data Pelanggan</h3>
         </div>
         <div class="card-body p-4">
            <form id="biodataForm" class="mb-4 row g-3 align-items-end">
                <div class="col-sm-6 col-md-3">
                    <label for="nama" class="form-label">Nama Pelanggan</label>
                    <input type="text" class="form-control" id="nama" required>
                </div>
                <div class="col-sm-6 col-md-3">
                    <label for="waktu" class="form-label">Waktu Masuk</label>
                    <input type="time" class="form-control" id="waktu" required>
                </div>
                <div class="col-md-4">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input type="text" class="form-control" id="keterangan" placeholder="Contoh: Paket 3 Jam">
                </div>
                <div class="col-md-2 d-grid">
                    <button type="submit" class="btn btn-galaxy">Tambah</button>
                </div>
            </form>

            <div class="table-responsive">
                <table class="table table-galaxy table-striped table-hover">
                    <thead>
                        <tr>
                            <th>Nama Pelanggan</th>
                            <th>Waktu Masuk</th>
                            <th>Keterangan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody id="biodataTableBody">
                        <?php foreach ($pelanggan as $p): ?>
                            <tr data-id="<?= $p['id'] ?>">
                                <td><?= htmlspecialchars($p['nama']) ?></td>
                                <td><?= htmlspecialchars(date('H:i', strtotime($p['waktu_masuk']))) ?></td>
                                <td><?= htmlspecialchars($p['keterangan'] ?: '-') ?></td>
                                <td><button class="btn btn-sm btn-danger btn-delete">Hapus</button></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>

<?php require_once 'templates/footer.php'; ?>