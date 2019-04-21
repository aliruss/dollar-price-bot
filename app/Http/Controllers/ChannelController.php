<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arbitag;

class ChannelController extends Controller
{
    public function index()
    {
        $arbitag = Arbitag::first();
        return view('price', compact('arbitag'));
    }
    public function edit(Request $request)
    {
        $art = Arbitag::first();
        $art->usd = $request->input('usd');
        $art->cad = $request->input('cad');
        $art->lir = $request->input('lir');
        $art->iqd = $request->input('iqd');
        $art->eur = $request->input('eur');
        $art->gbp = $request->input('gbp');
        $art->save();
        return redirect()->back()->with('success', 'tanzimat sabt shod!');
    }
}
