<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stranka dvě</title>
</head>
<body>
    
<div class="container" >

    <h1 style="text-align:center;width:100%">Tabulka "kategorie" z databáze</h1>

    <table class="table table-dark table-striped" style="text-align:center;width:100%">
        <thead>
            <tr>
                <th>název</th>
                <th>popis</th>
            </tr>
        </thead>
        <tbody>
            @foreach($customerData as $cd)
            <tr>
                <td>{{$cd->nazev}}</td>
                <td>{{$cd->popis}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>

</div>

 <a href="{{ url('/index') }}" class="btn btn-primary">Přejít na index</a>


</body>
</html>