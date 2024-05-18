
    <div class="card">
        <div class="card-header">Register Form</div>
        <div class="card-body"> 
        
            <form action= "{{ route('registrace') }}" method="POST">
             {!! csrf_field() !!}   
            <label>Křestní jméno</label>
            <input type="text" name="krestni_jmeno" id="krestni_jmeno" class ="form-control"> </br>

      
            <label>Příjmení</label>
            <input type="text" name="prijmeni" id="prijmeni" class ="form-control"> </br>

            <label>Přezdívka</label>
            <input type="text" name="prezdivka" id="prezdivka" class ="form-control"> </br>


            <label>Heslo</label>
            <input type="password" name="password" id="password" class ="form-control"> </br>
            
            <input type="submit" value="register" class="btn btn-success"> 

            </form>
        </div>
    </div>
