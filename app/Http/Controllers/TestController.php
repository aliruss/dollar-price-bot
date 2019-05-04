<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\USD;
use Carbon\Carbon;
use App\Traits\RequestTrait;
use App\Tusers;
use DB;
use Cache;
use Redis;

class TestController extends Controller
{
    use RequestTrait;

    public function index()
    {
        // $users = Tusers::orderBy('created_at', 'desk')->first();
        // // DB::connection()->enableQueryLog();
        
        // if ($userss = Cache::get('laravel_cache:telegramusers')) {
        //     return $userss;
        //     print_r($ali);
        // }
        // $users->fetchlast();
        // return $users .'bye';
        // // print_r($users);
        // // $queries = DB::getQueryLog();
        // // print_r($queries);
        $ali  = $this->apiRequest('getChatMember', [
            'chat_id' => '@testmybotp',
            'user_id' => '881193676'
        ]);
        if (isset($ali['status']) && $ali['status'] !== 'left') {
            return $ali['status'];
        } else {
            return 'hamid';
        }
    }
}
