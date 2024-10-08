<!DOCTYPE html>
<html>

<head>
    <title>TES</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Sertakan file JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.css">


</head>

<body> 
        <div class="p-3 mb-2 bg-primary text-white">

    <div class="p-3 mb-2 bg-primary text-white">

        <div class="container">

            <nav class="navbar navbar-expand-lg navbar-light bg-light">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#">NAVBAR</a>


                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link text-light bg-secondary rounded" href="{{ url('/') }}">Home</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light bg-secondary rounded" href="{{ route('siswa.index') }}" style="margin-left: 0.5rem;">Data Siswa</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light bg-secondary rounded" href="#" data-bs-toggle="modal" data-bs-target="#createSiswaModal" style="margin-left: 0.5rem;">Buat Data Siswa</a></li>
                            <li class="nav-item">
                                <a class="nav-link text-light bg-secondary rounded " href="{{ route('siswa.index', ['export' => 'excel']) }}"style="margin-left: 0.5rem;">Export Excel</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link text-light bg-secondary rounded" href="#" data-bs-toggle="modal" data-bs-target="#importExcel"style="margin-left: 0.5rem;">Import Excel</a>
                            </li>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <br>
            <form action="{{ route('siswa.index') }}" method="GET" class="d-flex flex-column align-items-start mb-4">
                <div class="input-group mb-2">
                    <select name="kolom" class="form-select">
                        <option value="nama" style="background-color: yellow" {{ request('kolom') === 'nama' ? 'selected' : '' }}>Nama</option>
                        <option value="nis" style="background-color: yellow" {{ request('kolom') === 'nis' ? 'selected' : '' }}>NIS</option>
                        <option value="alamat" style="background-color: yellow" {{ request('kolom') === 'alamat' ? 'selected' : '' }}>Alamat</option>
                    </select>
                    <input type="text" name="cari" class="form-control" placeholder="Cari.." value="{{ request('cari') }}">
                    <button type="submit" class="btn btn-secondary">Cari</button>
                </div>
            </form>
                       

            <div class="container mt-4">
                <center>
                    <h4>HAAAALLOOOoooOOO</h4>
                </center>

                @if ($errors->has('file'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
                @endif

                @if ($sukses = Session::get('sukses'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $sukses }}</strong>
                </div>
                @endif

                                @if(session('success'))
                    <div class="alert alert-success" role="alert">
                        {{ session('success') }}
                    </div>
                @endif

                @if(session('error'))
                    <div class="alert alert-danger" role="alert">
                        {{ session('error') }}
                    </div>
                @endif

                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif


                
               <!-- Modal Import Excel -->
               <div class="modal fade" id="importExcel" tabindex="-1" aria-labelledby="importExcelLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="importExcelLabel">Import Excel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="{{ route('siswa.store') }}" method="POST" enctype="multipart/form-data">
                                        @csrf
                                        <label>Pilih file excel</label>
                    
                                        <div class="mb-3">
                                            <input class="form-control" type="file" id="file" name="file" required="required">
                                        </div>
                                        <div class="modal-footer">
                                        <button type="submit" class="btn btn-primary">Import</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

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


                  <!-- views/modal/create-modal.blade.php -->
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
                                        <input type="text" id="nis" name="nis" class="form-control" required>
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
                  
                
                <table class='table table-hover table-bordered'>
                    <thead>
                        <tr>
                            <th>
                                <center>No
                            </th>
                            <th>
                                <center>Nama
                            </th>
                            <th>
                                <center>NIS
                            </th>
                            <th>
                                <center>Alamat
                            </th>
                            <th width="1%">
                                <center>Opsi
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @php $i=1 @endphp
                        @foreach($siswa as $s)
                        <tr>
                            <td>
                                <center>{{ $i++ }}
                            </td>
                            <td>
                                <center>{{$s->nama}}
                            </td>
                            <td>
                                <center>{{$s->nis}}
                            </td>
                            <td>
                                <center>{{$s->alamat}}
                            </td>
                            <td>
                                <div class="d-flex justify-content-between" style="gap: 10px;">
                                    <a class="btn btn-info mr-3" data-bs-toggle="modal" data-bs-target="#editModal" data-id="{{ $s->id }}" data-nama="{{ $s->nama }}" data-nis="{{ $s->nis }}" data-alamat="{{ $s->alamat }}">Edit</a>

                                    <form id="delete-form-{{ $s->id }}" action="{{ route('siswa.destroy', $s->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger" onclick="confirmDelete({{ $s->id }})">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <br>
            </div>
            <div class="mt-4">
                {{ $siswa->links() }}
            </div>
            
            
            <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/1.1.3/sweetalert.min.js"></script>
            <script src="{{ asset('js/delete-confirmation.js') }}"></script>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
            <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
            
            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    document.getElementById('submitSiswa').addEventListener('click', function(e) {
                        e.preventDefault(); 
                
                        swal({
                            title: "Konfirmasi",
                            text: "Apakah Anda yakin ingin menambah siswa ini?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willAdd) => {
                            if (willAdd) {
                                // Jika pengguna mengonfirmasi, kirimkan form
                                document.getElementById('siswabuatForm').submit();
                            }
                        });
                    });
                });
                </script>
                
            <script>
                document.addEventListener('DOMContentLoaded', function () {
                    const editButtons = document.querySelectorAll('[data-bs-toggle="modal"]');
            
                    editButtons.forEach(button => {
                        button.addEventListener('click', function () {
                            const modal = document.getElementById('editModal');
                            const id = this.getAttribute('data-id');
                            const nama = this.getAttribute('data-nama');
                            const nis = this.getAttribute('data-nis');
                            const alamat = this.getAttribute('data-alamat');
            
                            // Isi data ke dalam modal
                            modal.querySelector('#modalId').value = id;
                            modal.querySelector('#modalName').value = nama;
                            modal.querySelector('#modalNis').value = nis;
                            modal.querySelector('#modalAlamat').value = alamat;
                        });
                    });
                });
            </script>
            
            

           
       
            <script>
                    document.getElementById('submitBtn').addEventListener('click', function(e) {
                        e.preventDefault(); 
                        swal({
                            title: "Konfirmasi",
                            text: "Apakah Anda yakin ingin memperbarui data siswa ini?",
                            icon: "warning",
                            buttons: true,
                            dangerMode: true,
                        })
                        .then((willUpdate) => {
                            if (willUpdate) {
                                document.getElementById('editForm').submit();
                                swal({
                                    title: "Berhasil!",
                                    text: "Data siswa berhasil diperbarui!",
                                    icon: "success",
                                    button: false,
                                    timer: 2000
                                }).then(() => {
                                setTimeout(() => {
                                    window.location.href = "{{ route('siswa.index') }}";
                                }, 2000); 
                            }
                        });
                    });
            </script>
            
            
        </div>
    </div>
</body>

</html>