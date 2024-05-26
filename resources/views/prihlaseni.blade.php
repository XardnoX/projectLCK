<!DOCTYPE html>
<html>
<head> 
    @extends('layouts.app')
    <title>Prihlaseni</title>
  
</head>
<body>
    @if($errors->any())
    @foreach($errors->all() as $error)
    <div class="alert alert-danger">{{$error}}</div>
    @endforeach
    @endif

    @if(session()->has('error'))
    <div class="alert alert-danger">{{session('error')}}</div>
    @endif

    @if(session()->has('success'))
    <div class="alert alert-success">{{session('success')}}</div>
    @endif
    
    <form action="{{route('prihlaseni.post')}}" method="POST">
    @csrf
    <div class="form-group">
            <label for="prezdivka">Přezdívka:</label>
            <input type="text" class="form-control" name="prezdivka" required/>
        </div>

        <div class="form-group">
            <label for="heslo">Heslo:</label>
            <input type="password" class="form-control" name="heslo" required/>
        </div>

        <button type="submit" class="btn btn-primary">Přihlásit se</button>
  
        

    </form>

</body>
</html>