<!DOCTYPE html>
<html>

<head>
    <title>BISMILLAH BISA HEHE</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <!-- Sertakan file JavaScript Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

</head>

<body>
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
                                <a class="nav-link text-light bg-secondary rounded " href="{{ route('siswa.create') }}"style="margin-left: 0.5rem;">Buat Data Siswa</a>
                            </li>
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


            <div class="container mt-4">
                <center>
                    <h4>IHEHEHHEEHEHEH</h4>
                </center>

                {{-- notifikasi form validasi --}}
                @if ($errors->has('file'))
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $errors->first('file') }}</strong>
                </span>
                @endif

                {{-- notifikasi sukses --}}
                @if ($sukses = Session::get('sukses'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">×</button>
                    <strong>{{ $sukses }}</strong>
                </div>
                @endif

                <!-- Import Excel -->
                <div class="modal fade" id="importExcel" tabindex="-1" aria-labelledby="importExcelLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <form method="post" action="{{ route('siswa.store') }}" enctype="multipart/form-data">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="importExcelLabel">Import Excel</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    @csrf
                                    <label>Pilih file Excel (.xlsx, .csv)</label>
                                    <div class="form-group">
                                        <input type="file" name="file" class="form-control" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-success">Import</button>
                                </div>
                            </div>
                        </form>
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
                                <div class="d-flex justify-co   ntent-between" style="gap: 10px;">
                                    <!-- Edit button on the left -->
                                    <a class="btn btn-info mr-3" href="{{ route('siswa.edit', $s->id) }}">Edit</a>

                                    <!-- Delete button on the right -->
                                    <form action="{{ route('siswa.destroy', $s->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
            <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </div>
    </div>
</body>

</html>