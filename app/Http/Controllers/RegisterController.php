<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUzivatel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;

class RegisterController extends Controller
{
    public function create()
    {
        return view('registrace');
    }

    public function store(Request $request)
    {
        $request->validate([
            'krestni_jmeno' => 'required|string|max:255',
            'prijmeni' => 'required|string|max:255',
            'prezdivka' => 'required|string|max:255|unique:uzivatel,prezdivka',
            'heslo' => 'required|string|min:8',
        ]);

        $uzivatel = new User([
            'krestni_jmeno' => $request->get('krestni_jmeno'),
            'prijmeni' => $request->get('prijmeni'),
            'prezdivka' => $request->get('prezdivka'),
            'heslo' => Hash::make($request->get('heslo')),
            'datum_registrace' => now(),
        ]);

        $uzivatel->save();

        return redirect('/')->with('success', 'Registration successful');
    }
}