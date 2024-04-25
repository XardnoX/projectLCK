<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
abstract class Controller extends ProfileController
{
    
    public function index()
    {
        return view('index');
    }

}
