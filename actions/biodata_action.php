<?php
require_once __DIR__ . '/../init.php';


check_auth();

header('Content-Type: application/json');
$response = ['status' => 'error', 'message' => 'Terjadi kesalahan'];


$input = json_decode(file_get_contents('php://input'), true);
$action = $input['action'] ?? '';

if ($action == 'add') {
    $nama = $input['nama'] ?? '';
    $waktu = $input['waktu'] ?? '';
    $keterangan = $input['keterangan'] ?? '';

    if (!empty($nama) && !empty($waktu)) {
        $stmt = $pdo->prepare("INSERT INTO pelanggan (nama, waktu_masuk, keterangan) VALUES (?, ?, ?)");
        if ($stmt->execute([$nama, $waktu, $keterangan])) {
            $response['status'] = 'success';
            $response['message'] = 'Data berhasil ditambahkan.';
            $response['data'] = [
                'id' => $pdo->lastInsertId(),
                'nama' => htmlspecialchars($nama),
                'waktu' => htmlspecialchars($waktu),
                'keterangan' => htmlspecialchars($keterangan)
            ];
        } else {
            $response['message'] = 'Gagal menyimpan data ke database.';
        }
    } else {
        $response['message'] = 'Nama dan Waktu Masuk tidak boleh kosong.';
    }
} elseif ($action == 'delete') {
    $id = $input['id'] ?? 0;
    if ($id > 0) {
        $stmt = $pdo->prepare("DELETE FROM pelanggan WHERE id = ?");
        if ($stmt->execute([$id])) {
            $response['status'] = 'success';
            $response['message'] = 'Data berhasil dihapus.';
        } else {
            $response['message'] = 'Gagal menghapus data dari database.';
        }
    } else {
        $response['message'] = 'ID tidak valid.';
    }
}

echo json_encode($response);
?>