<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\USD;
use Carbon\Carbon;
use App\Traits\RequestTrait;
use App\Tusers;

class TestController extends Controller
{
    use RequestTrait;

    public function index()
    {
        $users = Tusers::all();
        for ($i = 0; $i < count($users); $i++) {
            $this->apiRequest('sendMessage', [
                'chat_id' => $users[$i]->userid,
                'text' => 'new test',
            ]);
            sleep(0.5);
        }
    }
}
