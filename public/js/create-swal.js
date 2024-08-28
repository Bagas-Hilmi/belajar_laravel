document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('submitSiswa').addEventListener('click', function(e) {
        e.preventDefault(); 

        Swal.fire({
            title: "Konfirmasi",
            text: "Apakah Anda yakin ingin menambah siswa ini?",
            icon: "warning",
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, tambahkan!'
        }).then((result) => {
            if (result.isConfirmed) {
                var form = document.getElementById('siswabuatForm');
                var formData = new FormData(form);

                fetch(form.action, {
                    method: 'POST',
                    body: formData,
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json'
                    }
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        Swal.fire(
                            'Berhasil!',
                            'Data siswa berhasil ditambahkan.',
                            'success'
                        );
                        $('#createSiswaModal').modal('hide');
                        form.reset();
                        $('#tbl_list').DataTable().ajax.reload();
                    } else {
                        Swal.fire(
                            'Error!',
                            data.message || 'Terjadi kesalahan saat menambahkan data.',
                            'error'
                        );
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    Swal.fire(
                        'Error!',
                        'Terjadi kesalahan saat menambahkan data.',
                        'error'
                    );
                });
            }
        });
    });
});
