<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Fullcoin;
use App\Oldfullcoin;

class SaveGold extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:gold';

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
        include_once('simple_html_dom.php');
        $html = file_get_html('https://bazar360.com/en/');
        $el = $html->find('#datacontainer > div:nth-child(1) > div.col-md-10.col-lg-9.col-xs-12 > div:nth-child(13) > table > tbody > tr:nth-child(1) > td:nth-child(4) > table > tbody > tr:nth-child(1) > td');
        if ($el[2]->innertext() !== 'SANA' && $el[2]->innertext() !== 'sana') {
            return $el[121]->innertext();
            //its not sana
            $fullid = 74;
            $oldid = 80;
            savegold('App\Fullcoin', $el, $fullid, 'fullcoin');
            savegold('App\Oldfullcoin', $el, $oldid, 'oldfullcoin');
            savegold('App\Halfcoin', $el, 86, 'halfgold');
            savegold('App\Quartercoin', $el, 92, 'quartercoin');
            savegold('App\Geramcoin', $el, 98, 'geramcoin');
            savegeram('App\Intergeram', $el, 104, 'intergeram');
            savegeram('App\Geramgold', $el, 108, 'geramgold');
        } else {
            // with
            savegold('App\Fullcoin', $el, 110, 'fullcoin');
            savegold('App\Oldfullcoin', $el, 116, 'oldfullcoin');
            savegold('App\Halfcoin', $el, 122, 'halfgold');
            savegold('App\Quartercoin', $el, 128, 'quartercoin');
            savegold('App\Geramcoin', $el, 134, 'geramcoin');
            savegeram('App\Intergeram', $el, 140, 'intergeram');
            savegeram('App\Geramgold', $el, 144, 'geramgold');
        }
    }
}
