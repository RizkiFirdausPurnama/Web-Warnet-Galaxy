document.addEventListener('DOMContentLoaded', function () {
  // --- LOGIC UNTUK DATA PELANGGAN (BIODATA.PHP) ---
const biodataForm = document.getElementById('biodataForm');
  const biodataTableBody = document.getElementById('biodataTableBody');

  // Pastikan elemen form dan tabel ada di halaman ini
  if (biodataForm && biodataTableBody) {
    
    // Fungsi untuk menambahkan baris baru ke tabel secara dinamis
    function addRowToTable(data) {
      const newRow = document.createElement('tr');
      newRow.setAttribute('data-id', data.id);
      newRow.innerHTML = `
                <td>${data.nama}</td>
                <td>${data.waktu}</td>
                <td>${data.keterangan || '-'}</td>
                <td><button class="btn btn-sm btn-danger btn-delete">Hapus</button></td>
            `;
      // Menambahkan baris baru di paling atas tabel
      biodataTableBody.prepend(newRow);
    }

    // Event listener saat form "Tambah" di-submit
    biodataForm.addEventListener('submit', function (event) {
      // Mencegah halaman refresh saat tombol diklik
      event.preventDefault();

      // Mengambil nilai dari setiap input
      const nama = document.getElementById('nama').value;
      const waktu = document.getElementById('waktu').value;
      const keterangan = document.getElementById('keterangan').value;

      // Menyiapkan data untuk dikirim ke backend
      const dataToSend = {
        action: 'add',
        nama: nama,
        waktu: waktu,
        keterangan: keterangan,
      };

      // Mengirim data ke file PHP menggunakan Fetch API
      fetch('../actions/biodata_action.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify(dataToSend),
      })
        .then((response) => response.json())
        .then((data) => {
          // Jika backend merespons 'success'
          if (data.status === 'success') {
            addRowToTable(data.data); // Tambahkan baris baru ke tabel
            biodataForm.reset(); // Kosongkan form
          } else {
            alert('Error: ' + data.message); // Tampilkan error jika gagal
          }
        })
        .catch((error) => console.error('Fetch error:', error));
    });

    // Event listener saat tombol "Hapus" di-klik
    biodataTableBody.addEventListener('click', function (event) {
      if (event.target.classList.contains('btn-delete')) {
        const row = event.target.closest('tr');
        const id = row.getAttribute('data-id');

        if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
          const dataToSend = {
            action: 'delete',
            id: id,
          };

          fetch('../actions/biodata_action.php', {
            method: 'POST',
            headers: {
              'Content-Type': 'application/json',
            },
            body: JSON.stringify(dataToSend),
          })
            .then((response) => response.json())
            .then((data) => {
              if (data.status === 'success') {
                row.remove(); // Hapus baris dari tabel
              } else {
                alert('Error: ' + data.message);
              }
            })
            .catch((error) => console.error('Fetch error:', error));
        }
      }
    });
  }
});