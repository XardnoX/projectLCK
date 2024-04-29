<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stranka</title>
</head>
<body>
    
    <div class="container" style="text-align:center;width:100%">
        <h1>Vkládání dat do tabulky "kategorie"</h1>

        <form action="dataInsert" method="post" enctype="multipart/form-data">
            @csrf

            <label for="nazev" class="control-label">nazev</label>
            <input type="text" name="nazev" class="form-control"><br>

            <label for="popis" class="control-label">popis</label>
            <input type="text" name="popis" class="form-control"><br>

            <input type="submit" class="btn brn-primary">

</form>
</div>

    <a href="{{ url('/kategorie') }}" class="btn btn-primary">Přejít na tabulku</a>


</body>
</html>