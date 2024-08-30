@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar User</div>

                <div class="card-body">
                    <a href="#" class="btn btn-sm btn-success mb-2" data-bs-toggle="modal" data-bs-target="#tambahDataModal">Tambah Data</a>                    
                    <a href="#" class="btn btn-sm btn-info mb-2" data-bs-toggle="modal" data-bs-target="#importExcel">Import Data</a>
                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama</th>
                            <th>NIS</th>
                            <th>Alamat</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                                        
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="editModalLabel">Edit Siswa</h5>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form id="editForm" action="{{ route('siswa.store') }}" method="POST"> 
                        @csrf
                        <input type="hidden" name="mode" value="UPDATE">
                        <input type="hidden" name="id" id="edit_id">
                        <div class="form-group">
                            <label for="nama">Nama </label>
                            <input type="text" name="nama" id="edit_nama" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="nis">NIS</label>
                            <input type="number" name="nis" id="edit_nis" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat </label>
                            <input type="text" name="alamat" id="edit_alamat" class="form-control" required>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-primary">Submit</button>
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    
    @include('modal.impor-modal')
    @include('modal.create-modal')

@endsection
<script src="{{ asset('js/delete-confirmation.js') }}"></script>
<script src="{{ asset('js/create-swal.js') }}"></script>

@push('scripts')
    <script type="text/javascript">
        $(document).ready(function () {
            if (!$.fn.DataTable.isDataTable('#tbl_list')) {
                $('#tbl_list').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: '{{ url()->current() }}',
                    columns: [
                        { data: 'id', name: 'id' },
                        { data: 'nama', name: 'Nama' },
                        { data: 'nis', name: 'NIS' },
                        { data: 'alamat', name: 'alamat' },
                        { data: 'action', name: 'action', orderable: false, searchable: false },
                    ]
                });
            }
        });

        // Fungsi untuk membuka modal edit
        window.openEditModal = function(id, nama, nis, alamat) {
            document.getElementById('edit_id').value = id;
            document.getElementById('edit_nama').value = nama;
            document.getElementById('edit_nis').value = nis;
            document.getElementById('edit_alamat').value = alamat;
            $('#editModal').modal('show');
        }

        // Event listener untuk form submit
        $('#editForm').on('submit', function(e) {
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
                    // Mengambil data formulir
                    var formData = new FormData(this);

                    // Mengirimkan permintaan AJAX
                    fetch(this.action, {
                        method: 'POST',
                        body: formData,
                        headers: {
                            'X-Requested-With': 'XMLHttpRequest',
                            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                        }
                    })
                    .then(response => response.json())
                    .then(data => {
                        if (data.success) {
                            Swal.fire('Sukses!', data.message, 'success');
                            $('#editModal').modal('hide');
                            // Refresh data table
                            $('#tbl_list').DataTable().ajax.reload();
                        } else {
                            Swal.fire('Gagal!', data.message, 'error');
                        }
                    })
                    .catch(error => {
                        console.error('Error:', error);
                        Swal.fire('Gagal!', 'Terjadi kesalahan saat mengirim data.', 'error');
                    });
                }
            });
        });
    </script>
@endpush