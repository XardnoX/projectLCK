<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategorie;
use Illuminate\Support\Facades\Response;

class DataController extends Controller
{
    function DataTableIndex(){
        $customerData = kategorie::all();
         $kategorie = kategorie::all();
         return view('DataTable', ['customerData' => $customerData, 'kategorie' => $kategorie]);
       
    }

    public function destroy($id)
    {
      
            $kategorie = Kategorie::find($id);
            $kategorie->delete();

             return back()->with('success', 'Smazání proběhlo úspěšně!');

         } 
}
