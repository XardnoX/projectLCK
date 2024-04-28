<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kategorie;
use Illuminate\Http\Request;

class kategorieController extends Controller
{
    //
    function index(){
        return view('index');
    }
    function DataInsert(Request $request){
        $nazev = $request->input('nazev');
        $popis = $request->input('popis');

        $isInsertSuccress = kategorie::insert(['nazev'=>$nazev,'popis'=>$popis]);
        if($isInsertSuccress)echo'<h1>Insert Success</h1>';
        else echo '<h1>Insert Failed</h1>';
    }

}
