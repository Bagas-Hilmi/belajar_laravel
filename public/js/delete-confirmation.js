function confirmDelete(id) {
    swal({
        title: "Apakah Anda yakin?",
        text: "Data siswa ini akan dihapus secara permanen!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Ya, hapus!",
        cancelButtonText: "Batal",
        closeOnConfirm: false
    },
    function(isConfirm){
        if (isConfirm) {
            document.getElementById('delete-form-' + id).submit();
        }
    });
}