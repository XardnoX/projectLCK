<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\kategorie;

class DataController extends Controller
{
    function DataTableIndex(){
        $customerData = kategorie::all();
        
        return view('DataTable', ['customerData'=>$customerData]);
    }
}
