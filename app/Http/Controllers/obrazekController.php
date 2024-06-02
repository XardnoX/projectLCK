<?php
namespace App\Http\Controllers;

use App\Models\Obrazek;
use Illuminate\Http\Request;

class obrazekController extends Controller
{
    public function showImage($id)
    {
        $obrazek = Obrazek::find($id);
        return view('obrazek', compact('obrazek'));
    }
}