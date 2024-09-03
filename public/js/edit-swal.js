// Fungsi untuk membuka modal edit
window.openEditModal = function (id, nama, nis, alamat) {
    document.getElementById("edit_id").value = id;
    document.getElementById("edit_nama").value = nama;
    document.getElementById("edit_nis").value = nis;
    document.getElementById("edit_alamat").value = alamat;
    $("#editModal").modal("show");
};

// Event listener untuk form submit
$("#editForm").on("submit", function (e) {
    e.preventDefault();

    Swal.fire({
        title: "Konfirmasi",
        text: "Apakah Anda yakin ingin memperbarui data ini?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonText: "Ya, perbarui!",
        cancelButtonText: "Batal",
        dangerMode: true,
    }).then((result) => {
        if (result.isConfirmed) {
            var formData = new FormData(this);

            $.ajax({
                url: $(this).attr("action"),
                type: "POST",
                data: formData,
                contentType: false,
                processData: false,
                headers: {
                    "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr("content"),
                },
                success: function (data) {
                    if (data.success) {
                        Swal.fire("Sukses!", data.message, "success");
                        $("#editModal").modal("hide");
                        // Refresh data table
                        $("#tbl_list").DataTable().ajax.reload();
                    } else {
                        Swal.fire("Gagal!", data.message, "error");
                    }
                },
                error: function (xhr) {
                    console.error("Error:", xhr);
                    Swal.fire(
                        "Gagal!",
                        "Terjadi kesalahan saat mengirim data.",
                        "error"
                    );
                },
            });
        }
    });
});
