<div class="modal fade" id="createSiswaModal" tabindex="-1" aria-labelledby="createSiswaModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createSiswaModalLabel">Create New Siswa</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="siswabuatForm" action="{{ route('siswa.store') }}" method="POST">
                    @csrf
                    <input type="hidden" name="mode" value="ADD">
                    <div class="mb-2">
                        <label for="nama" class="form-label">Nama:</label>
                        <input type="text" id="nama" name="nama" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="nis" class="form-label">NIS:</label>
                        <input type="number" id="nis" name="nis" class="form-control" required>
                    </div>
                    <div class="mb-2">
                        <label for="alamat" class="form-label">Alamat:</label>
                        <textarea id="alamat" name="alamat" class="form-control" required></textarea>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="submitSiswa">Tambah Siswa</button>
            </div>
        </div>
    </div>
</div>
