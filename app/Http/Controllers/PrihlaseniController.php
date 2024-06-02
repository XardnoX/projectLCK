<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class PrihlaseniController extends Controller
{
    public function show()
    {
        return view('prihlaseni');
    }

    public function loginPost(Request $request)
    {
        $request->validate([
            'prezdivka' => 'required',
            'heslo' => 'required',
        ]);
    

        $credentials = [
            'prezdivka' => $request->input('prezdivka'),
            'password' => $request->input('heslo'),
        ];

        /*$user = User::where('prezdivka','=',$request->prezdivka)->first();
        if($user && $request->heslo==$user->heslo){
            return redirect()->intended(route('index'));
        }
        return redirect(route('prihlaseni'))->with('error', 'login se nepoved');
    */
        /*if (Auth::attempt($credentials)) {
            return redirect()->intended(route('index'));
        }         --------NEMAZAT JE TO TU KDYBY NECO NEFUNGOVALO--------*/
        $user = User::where('prezdivka', $request->input('prezdivka'))->first();

        if ($user && Hash::check($request->input('heslo'), $user->heslo)) {
            // Uživatel byl úspěšně přihlášen
            Auth::login($user);
            return redirect()->intended('index');
        } else {
            // Neplatné přihlašovací údaje
            return back()->withErrors(['prezdivka' => 'Neplatné přihlašovací údaje']);
        }}

        

        /*return redirect(route('prihlaseni'))->with('error', 'login se nepoved');
    }     --------NEMAZAT JE TO TU KDYBY NECO NEFUNGOVALO--------*/

}
