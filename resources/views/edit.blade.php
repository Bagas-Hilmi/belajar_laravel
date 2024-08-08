<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
    <!-- Bootstrap CSS -->
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>

<div class="container mt-5">
    <h2><a href="https://www.malasngoding.com">EDIT </a></h2>
    <h3>Edit Pegawai</h3>
 
    <a href="/pegawai" class="btn btn-primary mb-3">Kembali</a>
 
    @foreach($pegawai as $p)
    <form action="/pegawai/update" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{ $p->pegawai_id }}"> 
        
        <div class="form-group">
            <label for="nama">Nama</label>
            <input type="text" class="form-control" id="nama" required="required" name="nama" value="{{ $p->pegawai_nama }}">
        </div>
        
        <div class="form-group">
            <label for="jabatan">Jabatan</label>
            <input type="text" class="form-control" id="jabatan" required="required" name="jabatan" value="{{ $p->pegawai_jabatan }}">
        </div>
        
        <div class="form-group">
            <label for="umur">Umur</label>
            <input type="number" class="form-control" id="umur" required="required" name="umur" value="{{ $p->pegawai_umur }}">
        </div>
        
        <div class="form-group">
            <label for="alamat">Alamat</label>
            <textarea class="form-control" id="alamat" required="required" name="alamat">{{ $p->pegawai_alamat }}</textarea>
        </div>
        
        <button type="submit" class="btn btn-success">Simpan Data</button>
    </form>
    @endforeach
</div>

<!-- Bootstrap JS, Popper.js, and jQuery -->
<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
