<?php
namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreUzivatel;
use Hash;
class RegisterController extends Controller
{

    public function create()
    {
        return view('registrace');
    }

  
    public function registraceInsert(StoreUzivatel $request)
    {
        $isInsertSuccess = User::insert($request->validated());
        $messageKey = $isInsertSuccess ? 'success' : 'failure';
        return redirect('registrace')->with('messageKey', $messageKey);
    }

}