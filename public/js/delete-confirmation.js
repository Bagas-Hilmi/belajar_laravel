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
            document.getElementById('delete-form-' + id).submit();
        }
    });
}