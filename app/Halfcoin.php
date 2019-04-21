<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Halfcoin extends Model
{
    protected $table = 'halfcoin';
    public function title()
    {
        return 'نیم سکه';
    }
}
