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
            var form = $("#delete-form-" + id);
            $.ajax({
                url: form.attr("action"),
                type: "DELETE",
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr(
                        "content"
                    ),
                },
                success: function (data) {
                    if (data.success) {
                        Swal.fire("Deleted!", data.success, "success").then(
                            () => {
                                location.reload();
                            }
                        );
                    } else {
                        Swal.fire("Error!", data.error, "error");
                    }
                },
                error: function () {
                    Swal.fire(
                        "Error!",
                        "Terjadi kesalahan saat menghapus data.",
                        "error"
                    );
                },
            });
        }
    });
}
