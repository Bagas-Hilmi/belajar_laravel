document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('tambahDataForm').addEventListener('submit', function(e) {
        e.preventDefault(); 

        Swal.fire({
            title: "Konfirmasi",
            text: "Apakah Anda yakin ingin menambahkan data ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonText: "Ya, tambah!",
            cancelButtonText: "Batal",
            dangerMode: true,
        }).then((result) => {
            if (result.isConfirmed) {
                // Mengambil data formulir
                var formData = new FormData(this);
                formData.append('mode', 'ADD'); 
                // Mengirimkan permintaan AJAX
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': formData.get('_token') 
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Sukses!', data.message, 'success');
                        $('#tambahDataModal').modal('hide');
                        // Refresh data table atau lakukan aksi lain jika perlu
                        $('#tbl_list').DataTable().ajax.reload(); // Pastikan ini sesuai dengan id tabel datamu
                    } else {
                        Swal.fire('Gagal!', data.message, 'error');
                    }
                })
                .catch(error => {
                    Swal.fire('Gagal!', 'Terjadi kesalahan saat mengirim data.', 'error');
                });
            }
        });
    });
});
