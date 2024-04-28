<!DOCTYPE html>
<html lang="en">
<head>
       
<meta name="csrf-token" content="{{ csrf_token() }}">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

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
    <td>{{ $cd->nazev }}</td>
    <td>{{ $cd->popis }}</td>
    <td><button type="button" class="btn btn-danger" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $cd->id }}">Smazat</button>
    </td>
</tr>
@endforeach
    </table>
  

</div>

 <a href="/index" class="btn btn-primary">Přejít na index</a>
<!-- potvrzení smazání -->
<div class="modal fade" id="confirmDeleteModal" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Potvrdit smazání</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Chcete doopravdy smazat tuhle kategorii?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary" id="confirmDelete">Yes</button>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function(){
    $('#confirmDeleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget);
        var id = $(this).data('id')


        var deleteUrl = '{{ route("kategorie.destroy", "") }}/' + id;

        $('#confirmDelete').off('click').on('click', function () {
            $.ajax({
                url: "/kategorie/" + id,
                type: 'POST',
                data: {
                    _method: 'DELETE',
                    _token: '{{ csrf_token() }}'
                },
                success: function(result) {
              
                    window.location.reload();
                }
            });
        });
    });
});
</script>




</body>

</html>
