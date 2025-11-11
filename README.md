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

## ⚙️ Panduan Instalasi dan Penyiapan Lokal

Untuk menjalankan proyek ini di komputer Anda, ikuti langkah-langkah berikut:

### 1. Prasyarat
* Pastikan Anda telah menginstal **XAMPP** (atau server lokal sejenis seperti WAMP/MAMP).
* Nyalakan modul **Apache** dan **MySQL** dari XAMPP Control Panel.

### 2. Penyiapan File
1.  **Unduh** atau **Clone** repositori ini.
2.  Letakkan seluruh folder proyek `warnetgalaxy` ke dalam direktori `htdocs` XAMPP Anda. (Biasanya di `C:\xampp\htdocs\`).

### 3. Penyiapan Database
1.  Buka browser dan akses **phpMyAdmin** (biasanya `http://localhost/phpmyadmin/`).
2.  Buat database baru dengan nama `warnet_galaxy`.
3.  Klik pada database `warnet_galaxy`, lalu buka tab **SQL**.
4.  Jalankan query SQL berikut untuk membuat tabel `admins`:

    ```sql
    CREATE TABLE admins (
      id INT AUTO_INCREMENT PRIMARY KEY,
      email VARCHAR(255) NOT NULL UNIQUE,
      password VARCHAR(255) NOT NULL
    );
    ```

5.  Jalankan query SQL berikut untuk membuat tabel `pelanggan`:

    ```sql
    CREATE TABLE pelanggan (
      id INT AUTO_INCREMENT PRIMARY KEY,
      nama VARCHAR(100) NOT NULL,
      waktu_masuk TIME NOT NULL,
      keterangan VARCHAR(255)
    );
    ```

6.  Jalankan query SQL berikut untuk memasukkan data admin default. (Password untuk akun ini adalah `admin123`):

    ```sql
    INSERT INTO admins (email, password) VALUES ('admin@gmail.com', '$2y$10$9.B2.l2oPA/jV3/MXx8GJO2DBxKLwQfk2j5B2.V3n7k5C6z3z4f4W');
    ```

### 4. Menjalankan Aplikasi
1.  Buka browser Anda.
2.  Akses URL berikut: **`http://localhost/warnetgalaxy/public/login.php`**
3.  Login menggunakan kredensial:
    * **Email:** `admin@gmail.com`
    * **Password:** `admin123`

Proyek sekarang seharusnya sudah berjalan dengan baik.
