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
    public function gold()
    {
        $goldarb = App\Goldarb::first();
        $fullcoin = App\Fullcoin::orderBy('created_at', 'desk')->first();
        $oldcoin = App\Oldfullcoin::orderBy('created_at', 'desk')->first();
        $halfcoin = App\Halfcoin::orderBy('created_at', 'desk')->first();
        $quartercoin = App\Quartercoin::orderBy('created_at', 'desk')->first();
        $geramcoin = App\Geramcoin::orderBy('created_at', 'desk')->first();
        $geramgold = App\Geramgold::orderBy('created_at', 'desk')->first();
        $intergeram = App\Intergeram::orderBy('created_at', 'desk')->first();
        return view('gold', compact('goldarb', 'fullcoin', 'oldcoin', 'halfcoin', 'quartercoin', 'geramcoin', 'geramgold', 'intergeram'));
    }
    public function savegold(Request $request)
    {
        $validation = $this->validate($request, [
            'fullcoin' => 'required',
            'oldfullcoin' => 'required',
            'quartercoin' => 'required',
            'halfcoin' => 'required',
            'geramcoin' => 'required',
            'geramgold' => 'required',
            'intergeram' => 'required',
        ]);
        $goldarb = App\Goldarb::first();
        $goldarb->fullcoin = $request->input('fullcoin');
        $goldarb->oldfullcoin = $request->input('oldfullcoin');
        $goldarb->quartercoin = $request->input('quartercoin');
        $goldarb->halfcoin = $request->input('halfcoin');
        $goldarb->geramcoin = $request->input('geramcoin');
        $goldarb->intergeram = $request->input('intergeram');
        $goldarb->geramgold = $request->input('geramgold');
        $goldarb->save();
        return redirect()->back()->with('success', 'tanzimat sabt shod!');
    }
}
