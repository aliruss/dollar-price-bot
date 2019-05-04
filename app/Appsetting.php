<?php

namespace App;

use Cache;
use Illuminate\Database\Eloquent\Model;

class Appsetting extends Model
{
    protected $table = 'appsetting';
    public function fetchlast()
    {
        $result = Cache::remember('settings', 10, function () {
            return $this;
        });
        return $result;
    }
    public function clear()
    {
        $result = Cache::clear();
    }
}
