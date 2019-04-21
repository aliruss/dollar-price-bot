<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iqd extends Model
{
    protected $table = 'iqd';
    public function title()
    {
        return 'دینار عراق';
    }
}
