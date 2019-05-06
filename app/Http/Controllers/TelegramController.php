<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\RequestTrait;
use App\Tusers;
use App\Appsetting;

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
        'mesgal' => 'مثقال طلا',
        'onsgold' => 'اونس طلای جهانی',
        'geramgold' => 'طلای ۱۸ عیار',
        'help' => 'راهنما',
        'helpme' => 'مشاوره زمان مناسب خرید و فروش و سرمایه گذاری',
    ];
    public function index()
    {
        $update = json_decode(file_get_contents('php://input'));
        if (isset($update->message)) {
            $message = $update->message;
            if (isset($message->text)) {
                $checkUserJoined  = $this->apiRequest('getChatMember', [
                    'chat_id' => '@MoshavereMTC',
                    'user_id' => $update->message->chat->id
                ]);
                if (isset($checkUserJoined['status']) && $checkUserJoined['status'] !== 'left') {
                    switch ($message->text) {
                        case '/start':
                        case $this->buttons['goback']:
                            $this->apiRequest('sendMessage', [
                                'chat_id' => $update->message->chat->id,
                                'text' => $update->message->chat->id,
                                'reply_markup' => json_encode([
                                    'keyboard' => [
                                        [$this->buttons['getprice'], $this->buttons['vip']],
                                        [$this->buttons['helpme']],
                                        [$this->buttons['contact_us'],$this->buttons['help']],
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
                                        [$this->buttons['edollar'], $this->buttons['cdollar']],
                                        [$this->buttons['lir'], $this->buttons['dinar']],
                                        [$this->buttons['eur'], $this->buttons['goback']]
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
                                        [$this->buttons['fullcoin'], $this->buttons['oldfullcoin']],
                                        [$this->buttons['halfcoin'], $this->buttons['quatarcoin']],
                                        [$this->buttons['geramcoin'], $this->buttons['geramgold']],
                                        [$this->buttons['onsgold'], $this->buttons['mesgal']],
                                        [$this->buttons['goback']]
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
                        case $this->buttons['mesgal']:
                            $this->apiRequest('sendMessage', [
                                'chat_id' => $update->message->chat->id,
                                'text' => getmes('قیمت مثقال طلا')
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
                                            ['text' => 'تماس تلفنی', 'callback_data' => 1],
                                        ],
                                        [
                                            ['text' => 'تلگرام', 'url' => 't.me/MoshaveranMTC'],
                                        ],
                                        [
                                            ['text' => 'اینستاگرام', 'url' => 'https://instagram.com/dollar.price?utm_source=ig_profile_share&igshid=7xe3lng2x9a'],
                                        ],
                                    ]
                                ]),
                            ]);
                            break;
                        case $this->buttons['help']:
                            $setting = Appsetting::first();
                            $this->apiRequest('sendMessage', [
                                'chat_id' => $update->message->chat->id,
                                'text' => $setting->help
                            ]);
                        break;
                        case $this->buttons['helpme']:
                            $setting = Appsetting::first();
                            $this->apiRequest('sendMessage', [
                                'chat_id' => $update->message->chat->id,
                                'text' => $setting->moshavere
                            ]);
                        break;
                        case 'admin':
                            $this->apiRequest('sendContact', [
                                'chat_id' => $update->message->chat->id,
                                'phone_number' => '+98 998 105 9979',
                                'first_name' => 'AliRus',
                                'reply_markup' => json_encode([
                                    'inline_keyboard' => [[['text' => 'ارتباط در تلگرام', 'url' => 'https://telegram.me/ali_rus']]]
                                ])
                            ]);
                            break;
                        default:
                            $this->apiRequest('sendMessage', [
                                'chat_id' => $update->message->chat->id,
                                'text' => 'دستور مورد نظر یافت نشد لطفا از دکمه های موجود استفاده کنید!'
                            ]);
                            break;
                    }
                } else {
                    switch ($message->text) {
                        case '/start':
                        case $this->buttons['goback']:
                            $this->apiRequest('sendMessage', [
                                'chat_id' => $update->message->chat->id,
                                'text' => 'از میان گزینه های زیر یک مورد را انتخاب کنید!',
                                'reply_markup' => json_encode([
                                    'keyboard' => [
                                        [$this->buttons['getprice'], $this->buttons['vip']],
                                        [$this->buttons['helpme']],
                                        [$this->buttons['contact_us'],$this->buttons['help']],
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
                        case $this->buttons['dollarprice']:
                            $this->apiRequest('sendMessage', [
                                'chat_id' => $update->message->chat->id,
                                'text' => 'از ارز های موجود یک مورد را انتخاب کنید!',
                                'reply_markup' => json_encode([
                                    'keyboard' => [
                                        [$this->buttons['edollar'], $this->buttons['cdollar']],
                                        [$this->buttons['lir'], $this->buttons['dinar']],
                                        [$this->buttons['eur'], $this->buttons['goback']]
                                    ],
                                    'resize_keyboard' => true
                                ])
                            ]);
                            break;
                            //gold price
                        case $this->buttons['goldprice']:
                            $this->apiRequest('sendMessage', [
                                'chat_id' => $update->message->chat->id,
                                'text' => 'از موارد زیر یک گزینه را انتخاب کنید!',
                                'reply_markup' => json_encode([
                                    'keyboard' => [
                                        [$this->buttons['fullcoin'], $this->buttons['oldfullcoin']],
                                        [$this->buttons['halfcoin'], $this->buttons['quatarcoin']],
                                        [$this->buttons['geramcoin'], $this->buttons['geramgold']],
                                        [$this->buttons['onsgold'], $this->buttons['mesgal']],
                                        [$this->buttons['goback']]
                                    ],
                                    'resize_keyboard' => true
                                ])
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
                                            ['text' => 'تماس تلفنی', 'callback_data' => 1],
                                        ],
                                        [
                                            ['text' => 'تلگرام', 'url' => 't.me/MoshaveranMTC'],
                                        ],
                                        [
                                            ['text' => 'اینستاگرام', 'url' => 'https://instagram.com/dollar.price?utm_source=ig_profile_share&igshid=7xe3lng2x9a'],
                                        ],
                                    ]
                                ]),
                            ]);
                            break;
                        case $this->buttons['help']:
                            $setting = Appsetting::first();
                            $this->apiRequest('sendMessage', [
                                'chat_id' => $update->message->chat->id,
                                'text' => $setting->help
                            ]);
                        break;
                        case $this->buttons['helpme']:
                            $setting = Appsetting::first();
                            $this->apiRequest('sendMessage', [
                                'chat_id' => $update->message->chat->id,
                                'text' => $setting->moshavere
                            ]);
                        break;
                        case 'admin':
                            $this->apiRequest('sendContact', [
                                'chat_id' => $update->message->chat->id,
                                'phone_number' => '+98 998 105 9979',
                                'first_name' => 'AliRus',
                                'reply_markup' => json_encode([
                                    'inline_keyboard' => [[['text' => 'ارتباط در تلگرام', 'url' => 'https://telegram.me/ali_rus']]]
                                ])
                            ]);
                            break;
                        default:
                            $this->apiRequest('sendMessage', [
                                'chat_id' => $update->message->chat->id,
                                'text' => 'برای حمایت و استفاده از این ربات لطفا در کانال عضو شوید تا بتوانید از خدمات کانال و ربات بهره مند شوید!' . PHP_EOL . '@MoshavereMTC',
                                'reply_markup' => json_encode([
                                    'inline_keyboard' => [
                                        [
                                            ['text' => 'عضو میشوم', 'url' => 'https://t.me/MoshavereMTC'],
                                        ],
                                        [
                                            ['text' => 'عضو شدم', 'callback_data' => 'joined'],
                                        ],
                                    ]
                                ]),
                            ]);
                            break;
                    }
                }
            }
        } elseif (isset($update->callback_query)) {
            if ($update->callback_query->data == 'joined') {
                $checkUserJoined  = $this->apiRequest('getChatMember', [
                    'chat_id' => '@MoshavereMTC',
                    'user_id' => $update->callback_query->message->chat->id,
                ]);
                if (isset($checkUserJoined['status']) && $checkUserJoined['status'] !== 'left') {
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->callback_query->message->chat->id,
                        'text' => 'تبریک عضویت شما با موفقیت انجام شد از این پس شما قادر به استفاده از ربات به صورت کاملا ازاد خواهید بود.'
                    ]);
                } else {
                    $this->apiRequest('sendMessage', [
                        'chat_id' => $update->callback_query->message->chat->id,
                        'text' => 'لطفا دوباره امتحان کنید احتمالا شما عضو کانال نشده اید!'
                    ]);
                }
            } elseif ($update->callback_query->data == 1) {
                $this->apiRequest('sendContact', [
                    'chat_id' => $update->callback_query->message->chat->id,
                    'first_name' => 'مشاوره خرید و فروش',
                    'phone_number' => '+98 912 854 9320',
                    'reply_to_message_id' => $update->callback_query->message->message_id,
                ]);
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
            'url' => str_replace('http', 'https', url(route('setweb')))
        ]) ? ['success'] : ['something has error'];
    }
}
