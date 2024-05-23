<!DOCTYPE html>
<html>
<head> 
    @extends('layouts.app')
    <title>Kategorie Stránek</title>¨
   
</head>
<body class="d-flex flex-column min-vh-100">
    <div class="container my-4 flex-grow-1">
        <h1>Kategorie Stránek</h1>
        <form method="POST" action="{{ url('/kategorie-stranek') }}">
            @csrf
            <div class="form-group">
                <label for="kategorie_id">Vyberte kategorii:</label>
                <select name="kategorie_id" id="kategorie_id" class="form-control">
                    @foreach($kategorie as $kategorium)
                        <option value="{{ $kategorium->id }}">{{ $kategorium->nazev }}</option>
                    @endforeach
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Zobrazit stránky</button>
        </form>

        @isset($stranky)
        <h2 class="mt-4">Stránky v kategorii</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Název stránky</th>
                </tr>
            </thead>
            <tbody>
                @foreach($stranky as $stranka)
                    <tr>
                        <td><a href="{{ url('stranka/' . $stranka->id) }}">{{ $stranka->nazev }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        @endisset
    </div>
    
    <footer class="footer mt-auto py-3 bg-light text-right">
        <div class="container">
            <span>© 2024 Kategorie Stránek</span>
        </div>
    </footer>

</body>
</html>
