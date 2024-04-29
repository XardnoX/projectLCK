<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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

            <input type="submit" class="btn btn-primary">

</form>
</div>

    <a href="{{ url('/kategorie') }}" class="btn btn-primary">Přejít na tabulku</a>


    @if (session('message'))
    {!! session('message') !!}
@endif
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('messageKey') === 'success')
<div class="modal" id="successModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Úspěch</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>kategorie byla úspešně vytvořena</p>
      </div>
    </div>
  </div>
</div>
@endif

<script>
$(document).ready(function() {
    if ("{{ session('messageKey') }}" === 'success') {
        $('#successModal').modal('show');
    }
});
</script>
</body>
</html>