<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\kategorie;
use Illuminate\Http\Request;
use App\Http\Requests\StoreKategorieRequest;
class kategorieController extends Controller
{
    public function index()
    {
        return view('index');
    }


    public function DataInsert(StoreKategorieRequest $request)
    {
        $isInsertSuccess = kategorie::insert($request->validated());
        $messageKey = $isInsertSuccess ? 'success' : 'failure';
        return redirect('/index')->with('messageKey', $messageKey);
    }
}