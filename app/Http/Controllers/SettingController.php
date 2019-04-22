<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Msetting;

class SettingController extends Controller
{
    public function index()
    {
        return view('setting');
    }
    public function titles()
    {
        return view('titles');
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
