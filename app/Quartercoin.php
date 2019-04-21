<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Quartercoin extends Model
{
    protected $table = 'quartercoin';
    public function title()
    {
        return 'ربع سکه';
    }
}
