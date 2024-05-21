<!DOCTYPE html>
<html>
<head>
    <title>Diskuse</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <h1 class="my-4">Diskuse</h1>
        @if($diskuse->isEmpty())
            <div class="alert alert-warning">No discussions found.</div>
        @else
            @foreach ($diskuse as $diskus)
                <div class="card mb-3">
                    <div class="card-header">
                        <strong>{{ $diskus->user->prezdivka }}</strong> - <span>{{ $diskus->datum }}</span>
                    </div>
                    <div class="card-body">
                        <p>{{ $diskus->obsah }}</p>

                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
