<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Artisan;
use App\Traits\RequestTrait;
use App\Tusers;

class FreshController extends Controller
{
    use RequestTrait;
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
    public function getmessage()
    {
        return view('allmessage');
    }
    public function send(Request $request)
    {
        $validate = $this->validate($request, [
            'message' => 'required',
        ]);
        $users = Tusers::all();
        foreach ($users as $user) {
            $this->apiRequest('sendMessage', [
                'chat_id' => $user->userid,
                'text' => $request->input('message'),
            ]);
            sleep(0.5);
        }
        return redirect()->back()->with('success', 'پیغام شما هم اکنون در حال ارسال است.');
    }
}
