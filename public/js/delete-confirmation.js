function confirmDelete(id) {
    Swal.fire({
        title: "Apakah Anda yakin?",
        text: "Data siswa ini akan dihapus secara permanen!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        dangerMode: true,
    }).then((result) => {
        if (result.isConfirmed) {
            var form = document.getElementById('delete-form-' + id);
            fetch(form.action, {
                method: 'DELETE',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify({})
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    Swal.fire('Deleted!', data.success, 'success')
                    .then(() => {
                        location.reload(); 
                    });
                } else {
                    Swal.fire('Error!', data.error, 'error');
                }
            })
            .catch(error => {
                Swal.fire('Error!', 'Terjadi kesalahan saat menghapus data.', 'error');
            });
        }
    });
}
