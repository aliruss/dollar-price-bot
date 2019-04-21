<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Arbitag;
use App;

class ChannelController extends Controller
{
    public function index()
    {
        $usd = App\USD::orderBy('created_at', 'desk')->first();
        $cad = App\Cad::orderBy('created_at', 'desk')->first();
        $lir = App\Lir::orderBy('created_at', 'desk')->first();
        $iqd = App\Iqd::orderBy('created_at', 'desk')->first();
        $gbp = App\Gbp::orderBy('created_at', 'desk')->first();
        $eur = App\Eur::orderBy('created_at', 'desk')->first();
        $arbitag = Arbitag::first();
        return view('price', compact('arbitag', 'usd', 'cad', 'lir', 'iqd', 'gbp', 'eur'));
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
