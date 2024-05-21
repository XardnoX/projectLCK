<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Stranka;
use App\Models\Diskuse;
use App\Models\HistorieEditace;
use App\Models\Kategorie;

class StrankaController extends Controller
{
    public function show($id)
    {
        $stranka = Stranka::with(['kategorie', ])->findOrFail($id);
        $diskuse = Diskuse::where('stranka_id', $id)->get();
        $historieEditace = HistorieEditace::where('stranka_id', $id)->get();
        return view('stranka.show', compact('stranka', 'diskuse', 'historieEditace'));
    }

    public function showCategories()
    {
        $kategorie = Kategorie::all();
        return view('kategorie-stranek', compact('kategorie'));
    }

    public function filterByCategory(Request $request)
    {
        $kategorie = Kategorie::all();
        $kategorium = Kategorie::findOrFail($request->kategorie_id);
        $stranky = $kategorium->stranky;
        return view('kategorie-stranek', compact('kategorie', 'stranky'));
    }
}
