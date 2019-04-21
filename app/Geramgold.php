<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geramgold extends Model
{
    protected $table = 'goldgeram';
    public function title()
    {
        return 'هر گرم سکه';
    }
}
