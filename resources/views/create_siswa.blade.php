<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Siswa</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
            @if (session('success'))
            <script>
                Swal.fire({
                    icon: 'success',
                    title: '{{ session('success') }}',
                    showConfirmButton: true,
                });
            </script>
          @endif

          @if (session('error'))
            <script>
                Swal.fire({
                    icon: 'error',
                    title: '{{ session('error') }}',
                    showConfirmButton: true,
                });
            </script>
          @endif   
    <div class="container mt-5">
        <h1 class="mb-4">Create New Siswa</h1>
        <!-- Form for creating a new siswa -->
        <form action="{{ route('siswa.store') }}" method="POST">
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
            <button type="submit" class="btn btn-primary" data-toggle="modal" data-target="modal12">Tambah Siswa</button>
        </form>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz4fnFO9a4yT2tK5yfXZ6t/7YB09maK8K8n4hOs5zCBcP1Mz2I8R2hFJh8b" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-7y0Mkl2w3pXynHlwG2CwFb+q+21dxG9T4sdf9Lg7y3f6YQmF/3A9Yz8g1s3zTj4A" crossorigin="anonymous"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

</body>
</html> 