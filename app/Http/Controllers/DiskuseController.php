<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Diskuse;
use App\Models\Stranka;

class DiskuseController extends Controller
{
    public function show($id)
    {
        $stranka = Stranka::findOrFail($id);
        $diskuse = Diskuse::where('stranka_id', $id)->get();

        return view('diskuse.show', compact('diskuse'));
    }
}
