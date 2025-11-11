# Warnet Galaxy - Admin Dashboard

`Warnet Galaxy` adalah aplikasi web dinamis yang berfungsi sebagai panel admin untuk mengelola data pelanggan di sebuah warung internet (warnet). Aplikasi ini dibangun dengan arsitektur **PHP** di sisi server dan **JavaScript** modern di sisi klien, dengan menggunakan **MySQL** sebagai database.

![Tampilan Halaman Login](https://i.imgur.com/gKqCgWJ.png)
![Tampilan Manajemen Data Pelanggan](https://i.imgur.com/B9zFqXW.png)

## 🚀 Fitur Utama

* **Autentikasi Admin:** Halaman login yang aman dengan verifikasi password yang di-hash menggunakan `password_verify()` PHP.
* **Sesi Pengguna:** Menggunakan Sesi PHP (`$_SESSION`) untuk melindungi halaman-halaman admin dan mengelola status login/logout.
* **Dashboard Statistik:** Halaman dashboard (saat ini statis) untuk menampilkan ringkasan operasional.
* **Manajemen Data (CRUD):**
    * **Create:** Menambahkan data pelanggan baru (Nama, Waktu Masuk, Keterangan).
    * **Read:** Menampilkan semua data pelanggan dari database MySQL secara *real-time* saat halaman dimuat.
    * **Delete:** Menghapus data pelanggan dari database.
* **Komunikasi Asinkron (AJAX):**
    * Penambahan dan penghapusan data pelanggan terjadi secara instan di latar belakang (tanpa me-refresh halaman) menggunakan **JavaScript Fetch API**.
    * Backend PHP (`biodata_action.php`) menangani permintaan ini dalam format **JSON**.

## 🛠️ Tumpukan Teknologi (Tech Stack)

### Front-End
* **HTML5**
* **CSS3** (dengan Variabel Kustom untuk tema galaksi)
* **JavaScript (ES6+)**
* **Bootstrap 5** (untuk layout dan komponen UI)
* **Bootstrap Icons**

### Back-End
* **PHP** (untuk semua logika server-side)
* **MySQL** (sebagai database)
* **PDO (PHP Data Objects)** (untuk koneksi database yang aman)
* **Apache** (dijalankan melalui XAMPP)

