<!DOCTYPE html>
<html>
<head>
    <title>Siswa App</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('siswa') }}">Siswa= Menu</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ url('siswa') }}">View All Siswa</a></li>
            <li><a href="{{ url('siswa/create') }}">Create a Siswa</a></li>
        </ul>
    </nav>

    <h1>Showing {{ $siswa->name }}</h1>

    <div class="jumbotron text-center">
        <h2>{{ $siswa->name }}</h2>
        <p>
            <strong>Email:</strong> {{ $siswa->email }}<br>
            <strong>Siswa Name:</strong> {{ $siswa->shark_level }}
        </p>
    </div>

</div>
</body>
</html>
