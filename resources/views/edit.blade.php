
<!DOCTYPE html>
<html>
<head>
	<title>Tutorial Membuat CRUD Pada Laravel - www.malasngoding.com</title>
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
 
	<h2><a href="https://www.malasngoding.com">www.malasngoding.com</a></h2>
	<h3>Edit karyawan</h3>
 
	<a href="/karyawan"> Kembali</a>
	
	<br/>
	<br/>
 
	@foreach($karyawan as $p)
	<form action="/karyawan/update" method="post">
		{{ csrf_field() }}
		<input type="hidden" name="id" value="{{ $p->karyawan_id }}"> 
		<br/>
		Nama <input type="text" required="required" name="nama" value="{{ $p->karyawan_nama }}"> <br/>
		
		Jabatan <input type="text" required="required" name="jabatan" value="{{ $p->karyawan_jabatan }}"> <br/>
		
		Umur <input type="number" required="required" name="umur" value="{{ $p->karyawan_umur }}"> <br/>
		
		Alamat <textarea required="required" name="alamat">{{ $p->karyawan_alamat }}</textarea> <br/>
		
		<input type="submit" value="Simpan Data">
	</form>
	@endforeach
		
 
</body>
</html>