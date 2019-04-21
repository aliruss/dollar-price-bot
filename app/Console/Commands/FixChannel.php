<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Traits\RequestTrait;

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
        $this->apiRequest('sendMessage', [
            'chat_id' => '@mabdah',
            'text' => getchannel('دلار آمریکا', 'App\USD')
        ]);
        $this->apiRequest('sendMessage', [
            'chat_id' => '@mabdah',
            'text' => getchannel('سکه تمام', 'App\Fullcoin')
        ]);
        $this->apiRequest('sendMessage', [
            'chat_id' => '@mabdah',
            'text' => getchannel('قیمت هر گرم طلا', 'App\Geramgold')
        ]);
    }
}
