<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geramcoin extends Model
{
    protected $table = 'geramcoin';
    public function title()
    {
        return 'گرم سکه';
    }
}
