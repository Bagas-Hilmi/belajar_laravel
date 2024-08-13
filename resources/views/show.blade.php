<!DOCTYPE html>
<html>

<head>
    <title>Tanks App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="container">

        <nav class="navbar navbar-light bg-light">
            <div class="container">
                <a class="navbar-brand" href="{{ url('tanks') }}">Tank Menu</a>
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a href="{{ url('tanks') }}" class="btn btn-secondary" style="margin-right: 10px;">View All Tank</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('tanks/create') }}" class="btn btn-warning">Create a Tank</a>
                    </li>
                </ul>
            </div>
        </nav>

        <h1 class="my-4">Showing {{ $tank->name }}</h1>

        <div class="jumbotron text-center">
            <h2>{{ $tank->name }}</h2>
            <p>
                <strong>Email:</strong> {{ $tank->email }}<br>
                <strong>Tank Level:</strong> {{ $tank->shark_level }}
            </p>
        </div>

    </div>
</body>

</html>