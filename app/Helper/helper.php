<?php
use Carbon\Carbon;
use App\Arbitag;

function carb($name)
{
    $art = Arbitag::first();
    $num = $art->$name;
    return $num;
}
function bmax($class, $item)
{
    $t = strtolower(str_replace("App\\", '', $class));
    $art = Arbitag::first();
    $adad =  $art->$t;
    return  $item->bmaxprice+$adad;
}
function bmin($class, $item)
{
    $t = strtolower(str_replace("App\\", '', $class));
    $art = Arbitag::first();
    $adad =  $art->$t;
    return  $item->bminprice+$adad;
}
function smax($class, $item)
{
    $t = strtolower(str_replace("App\\", '', $class));
    $art = Arbitag::first();
    $adad =  $art->$t;
    return  $item->smaxprice+$adad;
}
function smin($class, $item)
{
    $t = strtolower(str_replace("App\\", '', $class));
    $art = Arbitag::first();
    $adad =  $art->$t;
    return  $item->sminprice+$adad;
}
function setprice($text)
{
    $make = str_replace(',', '', $text);
    return intval($make);
}
function clear($class)
{
    $usd = $class::whereDate('created_at', Carbon::today())->get();
    $currencies = new $class;
    $currencies->smaxprice = $usd->sum('smaxprice')/\count($usd);
    $currencies->sminprice = $usd->sum('sminprice')/\count($usd);
    $currencies->bmaxprice = $usd->sum('bmaxprice')/\count($usd);
    $currencies->bminprice = $usd->sum('bminprice')/\count($usd);
    $currencies->sanamax = $usd->sum('sanamax')/\count($usd);
    $currencies->sanamin = $usd->sum('sanamin')/\count($usd);
    $currencies->save();
    if ($currencies->save()) {
        $class::whereDate('created_at', Carbon::today())->where('id', '<>', $currencies->id)->delete();
    }
}
function savegold($class, $el, $pos)
{
    $item = new $class;
    $item->bmaxprice = setprice($el[$pos]->innertext());
    $item->bminprice = setprice($el[$pos+1]->innertext());
    $item->smaxprice = setprice($el[$pos+2]->innertext());
    $item->sminprice = setprice($el[$pos+3]->innertext());
    $item->save();
}
function savegeram($class, $el, $pos)
{
    $item = new $class;
    $item->max = setprice($el[$pos]->innertext());
    $item->min = setprice($el[$pos+1]->innertext());
    $item->save();
}
function getprice($title, $class)
{
    $item = $class::orderBy('created_at', 'desk')->first();
    $message = $title . PHP_EOL .  'بیشترین قیمت خرید : ' . bmax($class, $item) . PHP_EOL . 'کمترین قیمت خرید : ' . bmin($class, $item) . PHP_EOL . 'بیشترین قیمت فروش : ' . smax($class, $item) . PHP_EOL . 'بیشترین قیمت خرید : ' . smin($class, $item);
    if ($item->sanamax !== null || $item->sanamins !== null) {
        $message .= PHP_EOL . 'بیشترین قیمت در بازار ثانویه(ثنا) : ' . $item->sanamax . PHP_EOL . 'کمترین قیمت در بازار ثانویه(ثنا) : ' . $item->sanamin;
    }
    return $message;
}

function getcoin($title, $class)
{
    $item = $class::orderBy('created_at', 'desk')->first();
    $message = $title . PHP_EOL .  'بیشترین قیمت خرید : ' . $item->bmaxprice . PHP_EOL . 'کمترین قیمت خرید : ' . $item->bminprice . PHP_EOL . 'بیشترین قیمت فروش : ' . $item->smaxprice . PHP_EOL . 'بیشترین قیمت خرید : ' . $item->sminprice;
    return $message;
}
function getgold($title, $class)
{
    $item = $class::orderBy('created_at', 'desk')->first();
    $message = $title . PHP_EOL .  'بیشترین قیمت : ' . $item->max . PHP_EOL . 'کمترین قیمت : ' . $item->min;
    return $message;
}
function getchannel($title, $class)
{
    $item = $class::orderBy('created_at', 'desk')->first();
    if ($class == 'App\Geramgold') {
        $message = ' هر مثقال طلا' . PHP_EOL . intval($item->max*4.33) . PHP_EOL . '@MoshavereMTC';
    } else {
        $message = $title . PHP_EOL . smax($class, $item) . PHP_EOL . '@MoshavereMTC';
    }
    return $message;
}
