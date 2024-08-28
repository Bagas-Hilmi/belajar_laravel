document.addEventListener("DOMContentLoaded", function () {
    // Mengatur data modal saat tombol edit diklik
    const editButtons = document.querySelectorAll('[data-bs-toggle="modal"]');

    editButtons.forEach((button) => {
        button.addEventListener("click", function () {
            const modal = document.getElementById("editModal");
            const id = this.getAttribute("data-id");
            const nama = this.getAttribute("data-nama");
            const nis = this.getAttribute("data-nis");
            const alamat = this.getAttribute("data-alamat");

            // Mengisi field modal dengan data yang diambil
            modal.querySelector("#modalId").value = id;
            modal.querySelector("#modalName").value = nama;
            modal.querySelector("#modalNis").value = nis;
            modal.querySelector("#modalAlamat").value = alamat;

            // Mengatur URL aksi form
            const form = modal.querySelector("#editForm");
            fetch(form.action, {
                method: "POST",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: formData,
            });
        });
    });

    document
        .getElementById("submitBtn")
        .addEventListener("click", function (e) {
            e.preventDefault();

            // Kirim data form menggunakan fetch API
            const form = document.getElementById("editForm");
            const formData = new FormData(form);

            fetch(form.action, {
                method: "POST",
                headers: {
                    "X-Requested-With": "XMLHttpRequest",
                    "X-CSRF-TOKEN": document
                        .querySelector('meta[name="csrf-token"]')
                        .getAttribute("content"),
                },
                body: formData,
            })
                .then((response) => response.json())
                .then((data) => {
                    if (data.success) {
                        // Tindakan jika sukses
                        alert(data.message);
                        $("#editModal").modal("hide");
                        window.location.href = "{{ route('siswa.index') }}";
                    } else {
                        alert(data.message);
                    }
                })
                .catch((error) => {
                    console.error("Terjadi kesalahan:", error);
                });
        });
});
