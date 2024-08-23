<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>
<body>
    <div class="container mt-5">
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
        <form id="siswaForm" action="{{ route('siswa.store') }}" method="POST">
            @csrf
            <input type="hidden" name="mode" value="UPDATE">
            <input type="hidden" name="id" value="{{ $siswa->id }}">
            <div class="mb-3">
                <label for="nama" class="form-label">Nama:</label>
                <input type="text" id="nama" name="nama" class="form-control" value="{{ $siswa->nama }}" required>
            </div>
            <div class="mb-3">
                <label for="nis" class="form-label">NIS:</label>
                <input type="number" id="nis" name="nis" class="form-control" value="{{ $siswa->nis }}" required>
            </div>
            <div class="mb-3">
                <label for="alamat" class="form-label">Alamat:</label>
                <textarea id="alamat" name="alamat" class="form-control" required>{{ $siswa->alamat }}</textarea>
            </div>
            <button type="button" id="submitBtn" class="btn btn-primary">Perbarui Siswa</button>
            <a class="btn btn-info" href="{{ route('siswa.index') }}" role="button">Back</a>
        </form>
        <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9a4yT2tK5yfXZ6t/7YB09maK8K8n4hOs5zCBcP1Mz2I8R2hFJh8b" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-7y0Mkl2w3pXynHlwG2CwFb+q+21dxG9T4sdf9Lg7y3f6YQmF/3A9Yz8g1s3zTj4A" crossorigin="anonymous"></script>
        <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    
        <script>
            document.getElementById('submitBtn').addEventListener('click', function(e) {
                e.preventDefault(); // Mencegah pengiriman form langsung

                swal({
                    title: "Konfirmasi",
                    text: "Apakah Anda yakin ingin memperbarui data siswa ini?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                })
                .then((willUpdate) => {
                    if (willUpdate) {
                        document.getElementById('siswaForm').submit();
                        swal({
                            title: "Berhasil!",
                            text: "Data siswa berhasil diperbarui!",
                            icon: "success",
                            button: false,
                            timer: 2000
                        }).then(() => {
                        setTimeout(() => {
                            window.location.href = "{{ route('siswa.index') }}";
                        }, 2000); // Pastikan waktu ini lebih dari timer notifikasi
                    });
                    }
                });
            });
        </script>
    </div>
</body>
</html>
