<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\USD;
use Carbon\Carbon;

class TestController extends Controller
{
    public function index()
    {
        require_once('simple_html_dom.php');
        $html = file_get_html('https://bazar360.com/en/');
        $el = $html->find('#datacontainer > div:nth-child(1) > div.col-md-10.col-lg-9.col-xs-12 > div:nth-child(13) > table > tbody > tr:nth-child(1) > td:nth-child(4) > table > tbody > tr:nth-child(1) > td');
        
        if ($el[2]->innertext() !== 'SANA' && $el[2]->innertext() !== 'sana') {
            return $el[121]->innertext();
            // return 'its not sana';
            $fullid = 74;
            $oldid = 80;
        // savegold('App\Fullcoin', $el, $fullid, 'fullcoin');
            // savegold('App\Oldfullcoin', $el, $oldid, 'oldfullcoin');
            // savegold('App\Halfcoin', $el, 86, 'halfgold');
            // savegold('App\Quartercoin', $el, 92, 'quartercoin');
            // savegold('App\Geramcoin', $el, 98, 'geramcoin');
            // savegeram('App\Intergeram', $el, 104, 'intergeram');
            // savegeram('App\Geramgold', $el, 108, 'geramgold');
        } else {
            // return 'its sans';
            return $el[110]->innertext();
        }
    }
}
