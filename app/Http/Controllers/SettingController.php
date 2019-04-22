<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Msetting;
use App\Mtitle;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting');
    }
    public function titles()
    {
        $title = Mtitle::first();
        return view('titles', compact('title'));
    }
    public function updatetitle(Request $request)
    {
        $validation = $this->validate($request, [
            'usd' => 'required',
            'mes' => 'required',
            'fullcoin' => 'required',
            'geram' => 'required',
            'iqd' => 'required',
            'lir' => 'required',
        ]);
        $title = Mtitle::first();
        $title->usd = $request->input('usd');
        $title->fullcoin = $request->input('fullcoin');
        $title->geram = $request->input('geram');
        $title->mes = $request->input('mes');
        $title->lir = $request->input('lir');
        $title->iqd = $request->input('iqd');
        $title->save();
        return redirect()->back()->with('success', 'tanzimat sabt shod');
    }
    public function msetting()
    {
        $set = Msetting::first();
        return view('msetting', compact('set'));
    }
    public function update(Request $request)
    {
        $setting = Msetting::first();
        $setting->usd = $request->input('usd');
        $setting->fullcoin = $request->input('fullcoin');
        $setting->send = $request->input('send');
        $setting->mes = $request->input('mes');
        $setting->geram = $request->input('geram');
        $setting->lir = $request->input('lir');
        $setting->iqd = $request->input('iqd');
        $setting->save();
        return redirect()->back()->with('success', 'tanzimat sabt shod!');
    }
}
