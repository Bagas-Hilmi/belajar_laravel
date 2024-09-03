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

                // Mengambil token CSRF dari meta tag atau hidden input
                const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

                // Mengirimkan permintaan AJAX
                fetch(this.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-Requested-With': 'XMLHttpRequest',
                        'X-CSRF-TOKEN': csrfToken
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire('Sukses!', data.message, 'success');

                        // Menyembunyikan modal menggunakan JavaScript murni
                        const tambahDataModal = document.getElementById('tambahDataModal');
                        const bootstrapModal = bootstrap.Modal.getInstance(tambahDataModal);
                        bootstrapModal.hide();

                        // Refresh tabel data
                        $('#tbl_list').DataTable().ajax.reload(); // Pastikan ini sesuai dengan id tabel datamu
                    } else {
                        Swal.fire('Gagal!', data.message, 'error');
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire('Gagal!', 'Terjadi kesalahan saat mengirim data.', 'error');
                });
            }
        });
    });
});
