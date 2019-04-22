<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\RequestTrait;
use App\Msetting;

class FixChannel extends Command
{
    use RequestTrait;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'fix:channel';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $set = Msetting::first();
        if ($set->send) {
            if ($set->usd) {
                $this->apiRequest('sendMessage', [
                    'chat_id' => '@mabdah',
                    'text' => getchannel('دلار آمریکا', 'App\USD')
                ]);
            }
            if ($set->fullcoin) {
                $this->apiRequest('sendMessage', [
                    'chat_id' => '@mabdah',
                    'text' => getchannel('سکه تمام', 'App\Fullcoin')
                ]);
            }
            if ($set->lir) {
                $this->apiRequest('sendMessage', [
                    'chat_id' => '@mabdah',
                    'text' => getchannel('قیمت لیر ترکیه', 'App\Lir')
                ]);
            }
            if ($set->iqd) {
                $this->apiRequest('sendMessage', [
                    'chat_id' => '@mabdah',
                    'text' => getchannel('قیمت دینار عراق', 'App\Iqd')
                ]);
            }
            if ($set->mes) {
                if (!$set->geram) {
                    $this->apiRequest('sendMessage', [
                        'chat_id' => '@mabdah',
                        'text' => sendmes('مثقال طلا', 'App\Geramgold', 0)
                    ]);
                } else {
                    $this->apiRequest('sendMessage', [
                        'chat_id' => '@mabdah',
                        'text' => sendmes('مثقال طلا', 'App\Geramgold', 1)
                    ]);
                }
            }
        }
    }
}
