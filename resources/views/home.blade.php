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
<script src="{{ asset('js/create-swal.js') }}"></script>
<script src="{{ asset('js/delete-confirmation.js') }}"></script>

@push('scripts')
<script>
    var baseUrl = "{{ url()->current() }}";
</script>
<script src="{{ asset('js/siswa.js') }}"></script>
<script src="{{ asset('js/edit-swal.js') }}"></script>
@endpush
