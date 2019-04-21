<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Fullcoin extends Model
{
    protected $table = 'fullcoin';
    public function title()
    {
        return 'سکه تمام';
    }
}
