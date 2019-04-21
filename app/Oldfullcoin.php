<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Oldfullcoin extends Model
{
    protected $table = 'oldfullcoin';
    public function title()
    {
        return 'سکه طح قدیم';
    }
}
