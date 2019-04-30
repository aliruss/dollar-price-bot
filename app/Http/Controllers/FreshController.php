<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;

class FreshController extends Controller
{
    public function gold()
    {
        Artisan::call('save:gold');
        return redirect()->back()->with('success', 'قیمت طلا به روزرسانی شد!');
    }
    public function currences()
    {
        Artisan::call('save:price');
        return redirect()->back()->with('success', 'قیمت ارز به روزرسانی شد!');
    }
}
