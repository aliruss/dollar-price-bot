<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\USD;
use App\Cad;
use App\Eur;
use App\Gbp;
use App\Lir;
use App\Iqd;

class SavePrice extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'save:price';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'save dollar price';

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
        $el = $html->find('#datacontainer > div:nth-child(1) > div.col-md-10.col-lg-9.col-xs-12 > div:nth-child(6) > table > tbody > tr:nth-child(1) > td:nth-child(5) > table > tbody > tr:nth-child(1) > td');
        if ($el[2] !== 'sana') {
            $usdid = 2;
            $cadid = 8;
            $eurid = 14;
            $gbpid = 20;
            $lirid = 38;
            $iqdid = 32;
            $usd = new USD;
            $usd->bmaxprice = setprice($el[$usdid]->innertext());
            $usd->bminprice = setprice($el[$usdid+1]->innertext());
            $usd->smaxprice = setprice($el[$usdid+2]->innertext());
            $usd->sminprice = setprice($el[$usdid+3]->innertext());
            $usd->save();
            $cad = new Cad;
            $cad->bmaxprice = setprice($el[$cadid]->innertext());
            $cad->bminprice = setprice($el[$cadid+1]->innertext());
            $cad->smaxprice = setprice($el[$cadid+2]->innertext());
            $cad->sminprice = setprice($el[$cadid+3]->innertext());
            $cad->save();
            $eur = new Eur;
            $eur->bmaxprice = setprice($el[$eurid]->innertext());
            $eur->bminprice = setprice($el[$eurid+1]->innertext());
            $eur->smaxprice = setprice($el[$eurid+2]->innertext());
            $eur->sminprice = setprice($el[$eurid+3]->innertext());
            $eur->save();
            $gbp = new Gbp;
            $gbp->bmaxprice = setprice($el[$gbpid]->innertext());
            $gbp->bminprice = setprice($el[$gbpid+1]->innertext());
            $gbp->smaxprice = setprice($el[$gbpid+2]->innertext());
            $gbp->sminprice = setprice($el[$gbpid+3]->innertext());
            $gbp->save();
            $lir = new Lir;
            $lir->bmaxprice = setprice($el[$lirid]->innertext());
            $lir->bminprice = setprice($el[$lirid+1]->innertext());
            $lir->smaxprice = setprice($el[$lirid+2]->innertext());
            $lir->sminprice = setprice($el[$lirid+3]->innertext());
            $lir->save();
            $iqd = new Iqd;
            $iqd->bmaxprice = setprice($el[$iqdid]->innertext());
            $iqd->bminprice = setprice($el[$iqdid+1]->innertext());
            $iqd->smaxprice = setprice($el[$iqdid+2]->innertext());
            $iqd->sminprice = setprice($el[$iqdid+3]->innertext());
            $iqd->save();
        } else {
            $usdid = 3;
            $cadid = 12;
            $eurid = 21;
            $gbpid = 30;
            $lirid = 57;
            $iqdid = 48;
            $usd = new USD;
            $usd->bmaxprice = setprice($el[$usdid]->innertext());
            $usd->bminprice = setprice($el[$usdid+1]->innertext());
            $usd->sanamin = setprice($el[$usdid+2]->innertext());
            $usd->smaxprice = setprice($el[$usdid+3]->innertext());
            $usd->sminprice = setprice($el[$usdid+4]->innertext());
            $usd->sanamax = setprice($el[$usdid+5]->innertext());
            $usd->save();
            $cad = new Cad;
            $cad->bmaxprice = setprice($el[$cadid]->innertext());
            $cad->bminprice = setprice($el[$cadid+1]->innertext());
            $cad->sanamin = setprice($el[$cadid+2]->innertext());
            $cad->smaxprice = setprice($el[$cadid+3]->innertext());
            $cad->sminprice = setprice($el[$cadid+4]->innertext());
            $cad->sanamax = setprice($el[$cadid+5]->innertext());
            $cad->save();
            $eur = new Eur;
            $eur->bmaxprice = setprice($el[$eurid]->innertext());
            $eur->bminprice = setprice($el[$eurid+1]->innertext());
            $eur->sanamin = setprice($el[$eurid+2]->innertext());
            $eur->smaxprice = setprice($el[$eurid+3]->innertext());
            $eur->sminprice = setprice($el[$eurid+4]->innertext());
            $eur->sanamax = setprice($el[$eurid+5]->innertext());
            $eur->save();
            $gbp = new Gbp;
            $gbp->bmaxprice = setprice($el[$gbpid]->innertext());
            $gbp->bminprice = setprice($el[$gbpid+1]->innertext());
            $gbp->sanamin = setprice($el[$gbpid+2]->innertext());
            $gbp->smaxprice = setprice($el[$gbpid+3]->innertext());
            $gbp->sminprice = setprice($el[$gbpid+4]->innertext());
            $gbp->sanamax = setprice($el[$gbpid+5]->innertext());
            $gbp->save();
            $lir = new Lir;
            $lir->bmaxprice = setprice($el[$lirid]->innertext());
            $lir->bminprice = setprice($el[$lirid+1]->innertext());
            $lir->sanamin = setprice($el[$lirid+2]->innertext());
            $lir->smaxprice = setprice($el[$lirid+3]->innertext());
            $lir->sminprice = setprice($el[$lirid+4]->innertext());
            $lir->sanamax = setprice($el[$lirid+5]->innertext());
            $lir->save();
            $iqd = new Iqd;
            $iqd->bmaxprice = setprice($el[$iqdid]->innertext());
            $iqd->bminprice = setprice($el[$iqdid+1]->innertext());
            $iqd->sanamin = setprice($el[$iqdid+2]->innertext());
            $iqd->smaxprice = setprice($el[$iqdid+3]->innertext());
            $iqd->sminprice = setprice($el[$iqdid+4]->innertext());
            $iqd->sanamax = setprice($el[$iqdid+5]->innertext());
            $iqd->save();
        }
    }
}
