<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cad extends Model
{
    protected $table = 'cad';
    public function title()
    {
        return 'دلار کانادا';
    }
}
