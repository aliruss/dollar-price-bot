<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\USD;
use Carbon\Carbon;
use App\Traits\RequestTrait;
use App\Tusers;
use DB;
use Cache;

class TestController extends Controller
{
    use RequestTrait;

    public function index()
    {
        $users = Tusers::orderBy('created_at', 'desk')->first();
        // DB::connection()->enableQueryLog();
        $result = $users->fetchlast();
        return $result->userid;
        // print_r($users);
        // $queries = DB::getQueryLog();
        // print_r($queries);
    }
}
