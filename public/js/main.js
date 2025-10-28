document.addEventListener('DOMContentLoaded', function () {
  // --- LOGIC UNTUK DATA PELANGGAN PAGE (BIODATA.PHP) ---
  const biodataForm = document.getElementById('biodataForm');
  const biodataTableBody = document.getElementById('biodataTableBody');

  if (biodataForm && biodataTableBody) {
    function addRowToTable(data) {
      const newRow = document.createElement('tr');
      newRow.setAttribute('data-id', data.id);
      newRow.innerHTML = `
                <td>${data.nama}</td>
                <td>${data.waktu}</td>
                <td>${data.keterangan || '-'}</td>
                <td><button class="btn btn-sm btn-danger btn-delete">Hapus</button></td>
            `;
      biodataTableBody.prepend(newRow); 
    }


    biodataForm.addEventListener('submit', function (event) {
      event.preventDefault();
      const nama = document.getElementById('nama').value;
      const waktu = document.getElementById('waktu').value;
      const keterangan = document.getElementById('keterangan').value;

      const dataToSend = {
        action: 'add',
        nama: nama,
        waktu: waktu,
        keterangan: keterangan,
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
            addRowToTable(data.data);
            biodataForm.reset();
          } else {
            alert('Error: ' + data.message);
          }
        })
        .catch((error) => console.error('Fetch error:', error));
    });


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
                row.remove();
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