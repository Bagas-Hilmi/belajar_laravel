<!DOCTYPE html>
<html>

<head>
    <title>Tank App</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    @php
    use Collective\Html\FormFacade as Form;
    use Collective\Html\HtmlFacade as HTML;
    @endphp
    <div class="container">

        <nav class="navbar navbar-inverse">
            <div class="navbar-header">
                <a class="navbar-brand" href="{{ URL::to('tanks') }}">Tank Menu</a>
            </div>
            <ul class="nav navbar-nav">
                <a href="{{ url('tanks') }}" class="btn btn-secondary" style="margin-right: 10px;">View All Tank</a>
            </ul>
        </nav>


        <h1>Create a Tank</h1>

        <!-- if there are creation errors, they will show here -->
        @if ($errors->any())
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
        @endif

        <form action="{{ url('tanks') }}" method="POST">
            @csrf
 
        <div class="form-group">
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ old('email') }}" class="form-control">
        </div>

        <div class="form-group">
            <label for="shark_level">Shark Level</label>
            <select name="shark_level" id="shark_level" class="form-control">
                <option value="0" {{ old('shark_level') == '0' ? 'selected' : '' }}>Select a Level</option>
                <option value="1" {{ old('shark_level') == '1' ? 'selected' : '' }}>Sees Sunlight</option>
                <option value="2" {{ old('shark_level') == '2' ? 'selected' : '' }}>Foosball Fanatic</option>
                <option value="3" {{ old('shark_level') == '3' ? 'selected' : '' }}>Basement Dweller</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary" style="margin-top: 10px;">Create the tank!</button>

        </form>


    </div>
</body>

</html>