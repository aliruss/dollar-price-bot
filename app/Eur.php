<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eur extends Model
{
    protected $table = 'eur';
    public function title()
    {
        return 'یورو';
    }
}
