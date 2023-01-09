<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>

<body>

<div class="container">

    <div class="panel panel-primary">

        <div class="panel-body">
        <!-- Alerta de éxito -->
        @if ($message = Session::get('success'))
        <div class="alert alert-success alert-block">
            <button type="button" class="close" data-dismiss="alert">x</button>
                {{ $message }}
        </div>
        <img src="{{ Session::get('image') }}">
        @endif

        <!-- Alerta de error -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                Error al subir el archivo.
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('image.upload.post') }}" method="POST" enctype="multipart/form-data">
            @csrf
            {{-- {{dd("imageupload");}} --}}
            <div class="row">

                <div class="col-md-6">
                    <input type="file" name="image" class="form-control">
                </div>

                <div class="col-md-6">
                    <button type="submit" class="btn btn-success">Subir</button>
                </div>

            </div>
        </form>

      </div>

    </div>

</div>

</body>
</html>
