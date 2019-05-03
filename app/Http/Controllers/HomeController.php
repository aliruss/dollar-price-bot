<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\RequestTrait;
use Carbon\Carbon;

class HomeController extends Controller
{
    use RequestTrait;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $new = $this->apiRequest('getWebhookInfo');
        if (isset($new['last_error_message'])) {
            $errorDate = Carbon::createFromTimestamp($new['last_error_date'])->toDateTimeString();
        }
        return view('home', compact('new', 'errorDate'));
    }
}
