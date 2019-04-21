<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\USD;
use Carbon\Carbon;

class TestController extends Controller
{
    public function index()
    {
        smax('App\USD');
        // getprice('hello', 'App\USD');
    }
}
