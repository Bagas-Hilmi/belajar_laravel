    <!DOCTYPE html>
    <html>

    <head>
        <title>Resources App</title>
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    </head>

    <body>
        <div class="container">

            <div class="d-flex justify-content-between align-items-center my-4">
                <span class="navbar-brand mb-0 h1">
                    <h1>All the Tanks</h1>
                </span>
                <a href="{{ url('tanks/create') }}" class="btn btn-warning">Create a Tank</a>
            </div>
            </nav>
            @if (session('message'))
            <div class="alert alert-info">{{ session('message') }}</div>
            @endif

            <table class="table table-striped table-bordered">
                <thead>
                    <tr>
                        <th class="text-center">ID</th>
                        <th class="text-center">Name</th>
                        <th class="text-center">Email</th>
                        <th class="text-center">Tank Level</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($list as $tank)
                    <tr>
                        <td class="text-center">{{ $tank->id }}</td>
                        <td class="text-center">{{ $tank->name }}</td>
                        <td class="text-center">{{ $tank->email }}</td>
                        <td class="text-center">{{ $tank->shark_level }}</td>
                        <td>
                            <div class="text-center mt-1">
                                <form action="{{ url('tanks/' . $tank->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-warning">Delete this Tank</button>
                                    <a class="btn btn-success" href="{{ url('tanks/' . $tank->id) }}">Show this Tank</a>
                                    <a class="btn btn-info" href="{{ url('tanks/' . $tank->id . '/edit') }}">Edit this Tank</a>

                            </div>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

        </div>
    </body>

    </html>