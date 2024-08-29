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
    @include('modal.impor-modal')
    @include('modal.create-modal')
    @include('modal.edit-modal')

@endsection
<script src="{{ asset('js/delete-confirmation.js') }}"></script>
<script src="{{ asset('js/create-swal.js') }}"></script>

@push('scripts')
            <script type="text/javascript">
                $(document).ready(function () {
                $('#tbl_list').DataTable({
                        processing: true,
                        serverSide: true,
                        ajax: '{{ url()->current() }}',
                        columns: [
                            { data: 'id', name: 'id' },
                            { data: 'nama', name: 'Nama' },
                            { data: 'nis', name: 'NIS' },
                            { data: 'alamat', name: 'alamat' },
                            { data: 'action', name: 'action', orderable: false, searchable: false},
                        ]
                    });
                });
            </script>


    <script>
    $(document).ready(function() {
        // Ketika tombol "Edit Siswa" diklik
        $('a[data-target="#editModal"]').click(function() {
            var siswaId = $(this).data('id'); // Ambil ID siswa dari tombol
    
            // AJAX request untuk mendapatkan data siswa berdasarkan ID
            $.get('/siswa/' + siswaId + '/edit', function(data) {
                // Isi modal dengan data yang diterima
                $('#modalId').val(data.id);
                $('#modalName').val(data.nama);
                $('#modalNis').val(data.nis);
                $('#modalAlamat').val(data.alamat);
                
                // Menampilkan modal "editModal"
                $('#editModal').modal('show');
            });
        });
    
        // Ketika form "editForm" disubmit
        $('#editForm').submit(function(event) {
            event.preventDefault(); // Mencegah pengiriman form secara standar
    
            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    // Tindakan setelah data berhasil diperbarui
                    alert('Data berhasil diperbarui!');
                    $('#editModal').modal('hide'); // Sembunyikan modal
                },
                error: function(xhr) {
                    // Tindakan jika terjadi error
                    alert('Terjadi kesalahan saat memperbarui data.');
                }
            });
        });
    });
    </script>
    
@endpush