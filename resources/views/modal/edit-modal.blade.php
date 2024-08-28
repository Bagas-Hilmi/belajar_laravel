<!-- Modal Edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Data Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form id="editForm" method="POST">
                @csrf
                @method('PUT') <!-- Menambahkan metode PUT untuk update -->
                <div class="modal-body">
                    <input type="hidden" id="modalId" name="id">
                    <div class="mb-3">
                        <label for="modalName" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="modalName" name="nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalNis" class="form-label">NIS</label>
                        <input type="number" class="form-control" id="modalNis" name="nis" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalAlamat" class="form-label">Alamat</label>
                        <textarea class="form-control" id="modalAlamat" name="alamat" rows="3" required></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="button" id="submitBtn" class="btn btn-primary">Simpan Perubahan</button>
                </div>
            </form> 
        </div>
    </div>
</div>
