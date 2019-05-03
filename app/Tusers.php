<?php

namespace App;

use Cache;
use Illuminate\Database\Eloquent\Model;

class Tusers extends Model
{
    protected $table = 'tuser';


    /**
     * Return all users
     *
     * @return Object
     */
    public function fetchlast()
    {
        $result = Cache::remember('telegramusers', 1, function () {
            return $this;
        });
        return $result;
    }
}
