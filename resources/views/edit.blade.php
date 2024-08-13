<!DOCTYPE html>
<html>
<head>
    <title>Tanks App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>
<body>
<div class="container">

    <nav class="navbar navbar-inverse">
        <div class="navbar-header">
            <a class="navbar-brand" href="{{ url('tanks') }}">Tank Menu</a>
        </div>
        <ul class="nav navbar-nav">
            <li><a href="{{ url('tanks') }}" class="btn btn-warning">View All Tank</a></li>
            <li><a href="{{ url('tanks/create') }} "class="btn btn-primary" style="margin-top: 10px;">Create a Tank</a></li>
        </ul>
    </nav>

    <h1>Edit {{ htmlspecialchars($tank->name) }}</h1>

    <!-- if there are creation errors, they will show here -->
    @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ htmlspecialchars($error) }}</li>
            @endforeach
        </ul>
    @endif

    <form action="{{ url('tanks/' . $tank->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name', $tank->name) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email', $tank->email) }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="shark_level">Tank Level</label>
            <select name="shark_level" id="shark_level" class="form-control">
                <option value="0" {{ old('shark_level', $tank->shark_level) == '0' ? 'selected' : '' }}>Select a Level</option>
                <option value="1" {{ old('shark_level', $tank->shark_level) == '1' ? 'selected' : '' }}>Sees Sunlight</option>
                <option value="2" {{ old('shark_level', $tank->shark_level) == '2' ? 'selected' : '' }}>Foosball Fanatic</option>
                <option value="3" {{ old('shark_level', $tank->shark_level) == '3' ? 'selected' : '' }}>Basement Dweller</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Edit the tank!</button>
    </form>

</div>
</body>
</html>
