<!-- Modal edit -->
<div class="modal fade" id="editModal" tabindex="-1" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Edit Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editForm" action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="mode" value="UPDATE">
                    <input type="hidden" name="id" id="modalId">
                    <div class="mb-3">
                        <label for="modalName" class="form-label">Nama:</label>
                        <input type="text" id="modalName" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalNis" class="form-label">NIS:</label>
                        <input type="number" id="modalNis" name="nis" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label for="modalAlamat" class="form-label">Alamat:</label>
                        <textarea id="modalAlamat" name="alamat" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Perbarui Siswa</button>
                </form>
            </div>
        </div>
    </div>
</div>

