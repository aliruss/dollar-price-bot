<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class DeletePrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'delete:price';

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
        clear('App\USD');
        clear('App\Lir');
        clear('App\Gbp');
        clear('App\Iqd');
        clear('App\Eur');
        clear('App\Cad');
    }
}
