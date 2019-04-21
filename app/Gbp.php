<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gbp extends Model
{
    protected $table = 'gbp';
    public function title()
    {
        return 'پوند انگلیس';
    }
}
