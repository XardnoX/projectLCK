<!DOCTYPE html>
<html lang="en">
<head>
@extends('layouts.app')
<title>Stranka dvě</title>
</head>
<body> 

@if (Auth::check())
        @if (Auth::user()->prezdivka == 'admin')

<div class="container">
    <h1 style="text-align:center;width:100%">Tabulka "kategorie" z databáze</h1>
    <table class="table table-dark table-striped" style="text-align:center;width:100%">
        <thead>
            <tr>
                <th>název</th>
                <th>popis</th>
                <th>Akce</th>
            </tr>
        </thead>
        <tbody>
        @foreach($customerData as $cd)
            <tr>
                <td>{{ $cd->nazev }}</td>
                <td>{{ $cd->popis }}</td>
                <td>
                <button type="button" class="btn btn-danger delete-btn" data-toggle="modal" data-target="#confirmDeleteModal" data-id="{{ $cd->id }}" onclick="setFormAction('{{ $cd->id }}')">Smazat</button>
                <button type="button" class="btn btn-primary edit-btn" data-toggle="modal" data-target="#editCategoryModal" data-id="{{ $cd->id }}" data-name="{{ $cd->nazev }}" data-description="{{ $cd->popis }}">Editovat</button>
                <td>
            </tr>
        @endforeach
        </tbody>
    </table>
 
</div>


<!-- edit -->
<div class="modal fade" id="editCategoryModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Editovat Kategorii</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="POST" id="editForm">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <input type="hidden" id="edit-id" name="id">
                    <div class="form-group">
                        <label for="edit-name">Název</label>
                        <input type="text" class="form-control" id="edit-name" name="nazev">
                    </div>
                    <div class="form-group">
                        <label for="edit-description">Popis</label>
                        <textarea class="form-control" id="edit-description" name="popis"></textarea>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Zrušit</button>
                    <button type="submit" class="btn btn-primary">Uložit Změny</button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- delete -->
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
                Chcete doopravdy smazat kategorii "{{ $cd->nazev}}"?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Ne</button>
                <form id="deleteForm" method="POST">
    @csrf
    @method('DELETE')
    <button class="btn btn-outline btn-danger" type="submit" id="deleteButton1">Smazat</button>
</form>
            </div>
        </div>
    </div>
</div>





<script>
    document.addEventListener('DOMContentLoaded', function () {
    var editForm = document.getElementById('editForm');
    document.querySelectorAll('.edit-btn').forEach(function(btn) {
        btn.addEventListener('click', function() {
            var categoryId = this.getAttribute('data-id');
            var categoryName = this.getAttribute('data-name');
            var categoryDescription = this.getAttribute('data-description');

            document.getElementById('edit-id').value = categoryId;
            document.getElementById('edit-name').value = categoryName;
            document.getElementById('edit-description').value = categoryDescription;

            editForm.action = '/kategorie/update/' + categoryId;
        });
    });
});
document.addEventListener('DOMContentLoaded', function () {
    if (window.location.pathname === '/kategorie') {
        var form = document.getElementById('deleteForm');

        document.querySelectorAll('.delete-btn').forEach(function(btn) {
            btn.addEventListener('click', function() {
                var kategorieId = this.getAttribute('data-id');
                
                form.action = '/kategorie/' + kategorieId;

                console.log("Form action set for category ID: " + kategorieId);
            });
        });
    }
});


    </script>

@elseif (Auth::user()->prezdivka != 'admin') 
<div class="text-center">
<h1>Pro přístup k obsahu téhle stránky musíte mít oprávnění administrátora</h1>
    <form action="{{ url('/prihlaseni') }}" method="get">
    <button class="btn btn-primary" type="submit">Přihlásit se</button>
</form>
</div>
@endif
@endif
@if (!Auth::check())
<div class="text-center">
    <h1>Pro přístup k obsahu téhle stránky musíte mít oprávnění administrátora</h1>
    <form action="{{ url('/prihlaseni') }}" method="get">
        <button class="btn btn-primary" type="submit">Přihlásit se</button>
    </form>
</div>
@endif

</body>

</html>
