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
        try {
            $kategorie = Kategorie::findOrFail($id);
            $kategorie->delete();

            if (request()->ajax()) {
                return response()->json(['success' => 'Category successfully deleted.']);
            }

            return redirect()->route('DataTable')->with('success', 'Category successfully deleted.');
        } catch (\Exception $e) {
            if (request()->ajax()) {
                return response()->json(['error' => 'An error occurred while deleting the category.'], 500);
            }

            return redirect()->route('DataTable')->with('error', 'An error occurred while deleting the category.');
        }
    }
}
