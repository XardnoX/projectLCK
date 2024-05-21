<!DOCTYPE html>
<html>
<head>
    <title>{{ $stranka->nazev }}</title>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container my-4 flex-grow-1">
        <h1>{{ $stranka->nazev }}</h1>
        <div class="row">
            <div class="col-md-8">
            <p>Kategorie:
            @foreach($stranka->kategorie as $kategorium)
                {{ $kategorium->nazev }}@if(!$loop->last), @endif
            @endforeach
        </p>
                <a href="{{ url('diskuse/' . $stranka->id) }}" class="btn btn-primary mb-3">Odkaz na diskusi</a>
            </div>
            <div class="col-md-4">
                <img src="data:image/png;base64,{{ $stranka->obrazek_id }}" class="img-fluid float-right mb-3" />
            </div>
        </div>
        
        <table class="table table-bordered mt-4">
            <thead>
                <tr>
                    <th>Popis editace</th>
                    <th>Datum editace</th>
                </tr>
            </thead>
            <tbody>
                @foreach($historieEditace as $editace)
                <tr>
                    <td>{{ $editace->popis_editace }}</td>
                    <td>{{ $editace->datum_editace }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    
    <footer class="footer mt-auto py-3 bg-light text-right">
        <div class="container">
            <span>{{ $stranka->datum_vytvoreni }} | Verze editace: {{ $editace->verze }}</span>
        </div>
    </footer>
</body>
</html>
