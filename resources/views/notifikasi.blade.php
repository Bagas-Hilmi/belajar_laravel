<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width initial-scale=1">

    <title>BELAJAR NOTIFIKASI CUY</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
</head>

<body>
    <div class="Container mt-5">
        <div class="row">
            <div class="col-md-12">
                <Center>
                @if ($message = Session::get('sukses'))
                <div class="alert alert-success alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('gagal'))
                <div class="alert alert-danger alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif

                @if ($message = Session::get('peringatan'))
                <div class="alert alert-warning alert-block">
                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                    <strong>{{ $message }}</strong>
                </div>
                @endif
                </Center>


                <center>
                    <a href="/pesan/sukses" class="btn btn-success">NOTIFIKASI SUKSES</a>
                    <a href="/pesan/gagal" class="btn btn-danger">NOTIFIKASI GAGAL</a>
                    <a href="/pesan/peringatan" class="btn btn-warning">NOTIFIKASI PERINGATAN</a>
                </center>

            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>

</html>