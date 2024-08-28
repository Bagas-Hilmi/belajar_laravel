@extends('layouts.apps')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar User</div>

                <div class="card-body">
                    <a href="#" class="btn btn-sm btn-success mb-2" data-bs-toggle="modal" data-bs-target="#createSiswaModal">Tambah Data</a>
                    <a href="#" class="btn btn-sm btn-primary mb-2" data-bs-toggle="modal" data-bs-target="#importExcel">Import Data</a>
                    <table id="tbl_list" class="table table-striped table-bordered" cellspacing="0" width="100%">
                        <thead>
                            <tr>
                                <th><center>No</th>
                                <th><center>Name</th>
                                <th><center>Nis</th>
                                <th><center>Alamat</th>
                                <th><center>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    @include('modal.create-modal')
    @include('modal.impor-modal')
    @include('modal.edit-modal')
</div>

@endsection
<script src="{{ asset('js/delete-confirmation.js') }}"></script>
<script src="{{ asset('js/edit-swal.js') }}"></script>
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
        { data: 'nama', name: 'nama' },
        { data: 'nis', name: 'NIS' },
        { data: 'alamat', name: 'alamat' },
        { data: 'action', name: 'action', orderable: false, searchable: false },
    ]
});

    });
    
</script>

@endpush

