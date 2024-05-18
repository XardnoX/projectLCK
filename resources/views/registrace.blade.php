<!DOCTYPE html>
<html>
<head>
    <title>Registrace</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<div class="container">
    <h2>Register</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="/registrace">
        @csrf
        <div class="form-group">
            <label for="krestni_jmeno">Křestní jméno:</label>
            <input type="text" class="form-control" name="krestni_jmeno" required/>
        </div>
        <div class="form-group">
            <label for="prijmeni">Příjmení:</label>
            <input type="text" class="form-control" name="prijmeni" required/>
        </div>
        <div class="form-group">
            <label for="prezdivka">Přezdívka:</label>
            <input type="text" class="form-control" name="prezdivka" required/>
        </div>
        <div class="form-group">
            <label for="heslo">Heslo:</label>
            <input type="password" class="form-control" name="heslo" required/>
        </div>
        <button type="submit" class="btn btn-primary">Registrovatk</button>
    </form>
</div>
</body>
</html>
