<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\RequestTrait;
use App\Tusers;

class TelegramController extends Controller
{
    use RequestTrait;
    private $buttons = [
        'contact_us' => 'تماس با ما',
        'vip' => 'دریافت عضویت vip',
        'dollarprice' => 'قیمت ارز',
        'getprice' => 'دریافت قیمت',
        'goldprice' => 'قیمت طلا',
        'admin' => 'تماس با توسعه دهنده',
        'edollar' => 'دلار آمریکا',
        'cdollar' => 'دلار کانادا',
        'eur' => 'یورو',
        'lir' => 'لیر ترکیه',
        'dinar' => 'دینار عراق',
        'goback' => 'بازگشت به صفحه نخست',
        'telegram' => 'تلگرام',
        'fullcoin' => 'سکه تمام (جدید)',
        'oldfullcoin' => 'سکه تمام (قدیم)',
        'halfcoin' => 'نیم سکه',
        'quatarcoin' => 'ربع سکه',
        'geramcoin' => 'گرم سکه',
        'onsgold' => 'اونس طلای جهانی',
        'geramgold' => 'طلای ۱۸ عیار',
    ];
    public function index()
    {        // clear('App\USD');
        $update = json_decode(file_get_contents('php://input'));
        if (isset($update->message)) {
            $message = $update->message;
            if (isset($message->text)) {
                switch ($message->text) {
                    case '/start': case $this->buttons['goback']:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => 'از منوی زیر یک مورد را انتخاب کنید!',
                        'reply_markup' => json_encode([
                            'keyboard'=>[
                                [$this->buttons['getprice'],$this->buttons['vip']],
                                [$this->buttons['contact_us'],$this->buttons['admin']],
                            ],
                            'resize_keyboard' => true
                        ]),
                    ]);
                    if (!Tusers::where('userid', $update->message->chat->id)->exists()) {
                        $user = new Tusers;
                        $user->userid = $update->message->chat->id;
                        $user->save();
                    }
                    break;
                    case $this->buttons['getprice']:
                    include_once('simple_html_dom.php');
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => 'از منوی زیر یک آیتم انتخاب کنید!',
                        'reply_markup' => json_encode([
                            'keyboard' => [
                                [$this->buttons['dollarprice']],
                                [$this->buttons['goldprice']]
                            ],
                            'resize_keyboard' => true
                        ]),
                    ]);
                    break;
                    //get cash price
                    case $this->buttons['dollarprice']:
                        $this->apiRequest('sendMessage', [
                            'chat_id' => $update->message->chat->id,
                            'text' => 'از ارز های موجود یک مورد را انتخاب کنید!',
                            'reply_markup' => json_encode([
                                'keyboard' => [
                                    [$this->buttons['edollar'],$this->buttons['cdollar']],
                                    [$this->buttons['lir'],$this->buttons['dinar']],
                                    [$this->buttons['eur'],$this->buttons['goback']]
                                ],
                                'resize_keyboard' => true
                            ])
                        ]);
                    break;
                    case $this->buttons['edollar']:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => getPrice('قیمت دلار آمریکا', 'App\USD')
                    ]);
                    break;
                    case $this->buttons['cdollar']:
                        $this->apiRequest('sendMessage', [
                            'chat_id' => $update->message->chat->id,
                            'text' => getPrice('قیمت دلار کانادا', 'App\Cad')
                        ]);
                    break;
                    case $this->buttons['eur']:
                        $this->apiRequest('sendMessage', [
                            'chat_id' => $update->message->chat->id,
                            'text' => getPrice('قیمت یورو', 'App\Eur')
                        ]);
                    break;
                    case $this->buttons['dinar']:
                        $this->apiRequest('sendMessage', [
                            'chat_id' => $update->message->chat->id,
                            'text' => getPrice('دینار عراق', 'App\Iqd')
                        ]);
                    break;
                    case $this->buttons['lir']:
                        $this->apiRequest('sendMessage', [
                            'chat_id' => $update->message->chat->id,
                            'text' => getPrice('قیمت لیر ترکیه', 'App\Lir')
                        ]);
                    break;
                    //end cash price
                    //gold price
                    case $this->buttons['goldprice']:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => 'از موارد زیر یک گزینه را انتخاب کنید!',
                        'reply_markup' => json_encode([
                            'keyboard' => [
                                [$this->buttons['fullcoin'],$this->buttons['oldfullcoin']],
                                [$this->buttons['halfcoin'],$this->buttons['quatarcoin']],
                                [$this->buttons['geramcoin'],$this->buttons['geramgold']],
                                [$this->buttons['onsgold'],$this->buttons['goback']],
                            ],
                            'resize_keyboard' => true
                        ])
                    ]);
                    break;
                    case $this->buttons['fullcoin']:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => getcoin('قیمت سکه تمام', 'App\Fullcoin')
                    ]);
                    break;
                    case $this->buttons['oldfullcoin']:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => getcoin('قیمت سکه طرح قدیم', 'App\Oldfullcoin')
                    ]);
                    break;
                    case $this->buttons['halfcoin']:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => getcoin('قیمت نیم سکه', 'App\Halfcoin')
                    ]);
                    break;
                    case $this->buttons['quatarcoin']:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => getcoin('قیمت ربع سکه', 'App\Quartercoin')
                    ]);
                    break;
                    case $this->buttons['geramcoin']:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => getcoin('قیمت گرم سکه', 'App\Geramcoin')
                    ]);
                    break;
                    case $this->buttons['onsgold']:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => getgold('قیمت انس جهانی طلا', 'App\Intergeram')
                    ]);
                    break;
                    case $this->buttons['geramgold']:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => getgold('قیمت گرم طلا', 'App\Geramgold')
                    ]);
                    break;
                    case $this->buttons['vip']:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => 'این بخش فعلا غیر فعال است لطفا برای خرید عضویت با شماره زیر تماس حاصل فرمایید!' . PHP_EOL . '0912 000 0000',
                    ]);
                    break;
                    case $this->buttons['contact_us']:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => 'برای دریافت اطلاعات تماس دلخواه بر روی دکمه های زیر کلیک کنید!',
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [
                                [
                                    ['text' => 'تماس تلفنی','url' => 'https://41dceec7.ngrok.io/call'],
                                ],
                                [
                                    ['text' => 'تلگرام','callback_data' => 'new'],
                                ],
                                [
                                    ['text' => 'وبسایت','url' => 'www.google.com'],
                                ],
                                [
                                    ['text' => 'ایمیل','url' => 'mailto:alikhalili4549@gmail.com'],
                                ],
                                [
                                    ['text' => 'اینستاگرام','url' => 'mailto:alikhalili4549@gmail.com'],
                                ],
                            ]
                        ]),
                        ]);
                    break;
                    case 'new':
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => 'new'
                    ]);
                    break;
                    case $this->buttons['admin']:
                    $this->apiRequest('sendContact', [
                        'chat_id' => $update->message->chat->id,
                        'phone_number' => '989128549320',
                        'first_name' => 'مشاوره خرید و فروش',
                        'reply_markup' => json_encode([
                            'inline_keyboard' => [[['text' => 'تماس', 'url' => 'https://41dceec7.ngrok.io/call']],[['text'=>'ارتباط در تلگرام', 'url' => 'https://telegram.me/MoshaveranMTC']]]
                        ])
                    ]);
                    break;
                    default:
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->message->chat->id,
                        'text' => 'no available'
                    ]);
                    break;
                }
            }
        }
        // $this->apiRequest('sendMessage', [
        //     'chat_id' => $update->message->chat->id,
        //     'text' => 'salam'
        // ]);
    }
    public function webhook()
    {
        return $this->apiRequest('setWebhook', [
            'url' => str_replace('http', 'https', url(route('webhook')))
        ]) ? ['success'] : ['something has error'];
    }
}
