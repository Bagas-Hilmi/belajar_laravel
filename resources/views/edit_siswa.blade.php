<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"></head>
</head>
<body>
    <div class="container">
        <h1>Edit Siswa</h1>
        @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        <form action="{{ route('siswa.store') }}" method="POST">
            @csrf
            <input type="hidden" name="mode" value="UPDATE">
            <input type="hidden" name="id" value="{{ $siswa->id }}">
            <div>
                <label for="nama">Nama:</label>
                <input type="text" id="nama" name="nama" value="{{ $siswa->nama }}" required>
            </div>
            <div>
                <label for="nis">NIS:</label>
                <input type="number" id="nis" name="nis" value="{{ $siswa->nis }}" required>
            </div>
            <div>
                <label for="alamat">Alamat:</label>
                <textarea id="alamat" name="alamat" required>{{ $siswa->alamat }}</textarea>
            </div>
            <button type="submit">Perbarui Siswa</button>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9a4yT2tK5yfXZ6t/7YB09maK8K8n4hOs5zCBcP1Mz2I8R2hFJh8b" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-7y0Mkl2w3pXynHlwG2CwFb+q+21dxG9T4sdf9Lg7y3f6YQmF/3A9Yz8g1s3zTj4A" crossorigin="anonymous"></script>
    
    </div>
</body>
</html>