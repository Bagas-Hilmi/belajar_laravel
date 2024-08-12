<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat Pencarian Pada Laravel - www.malasngoding.com</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous"><body>
 
	<div class="container">
		<div class="card">
			<div class="card-body">
				
 
				<h2 class="text-center"><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
 
				<h3>Data karyawan</h3>
 
				<p>Cari Data karyawan :</p>
 
				<div class="form-group">
					
				</div>
				<form action="/karyawan/cari" method="GET" class="form-inline">
					<input class="form-control" type="text" name="cari" placeholder="Cari karyawan .." value="{{ old('cari') }}">
					<input class="btn btn-primary ml-3" type="submit" value="CARI">
				</form>
 
				<br/>
 
				<table class="table table-bordered">
					<tr>
						<th>Nama</th>
						<th>Jabatan</th>
						<th>Umur</th>
						<th>Alamat</th>
						<th>Opsi</th>
					</tr>
					@foreach($karyawan as $p)
					<tr>
						<td>{{ $p->karyawan_nama }}</td>
						<td>{{ $p->karyawan_jabatan }}</td>
						<td>{{ $p->karyawan_umur }}</td>
						<td>{{ $p->karyawan_alamat }}</td>
						<td>
							<a class="btn btn-warning btn-sm" href="/karyawan/edit/{{ $p->karyawan_id }}">Edit</a>
							<a class="btn btn-danger btn-sm" href="/karyawan/hapus/{{ $p->karyawan_id }}">Hapus</a>
						</td>
					</tr>
					@endforeach
				</table>
 
				<br/>
				Halaman : {{ $karyawan->currentPage() }} <br/>
				Jumlah Data : {{ $karyawan->total() }} <br/>
				Data Per Halaman : {{ $karyawan->perPage() }} <br/>
				<br/>
				{{ $karyawan->links() }}
			</div>
		</div>
	</div>
 
 
</body>
</html>