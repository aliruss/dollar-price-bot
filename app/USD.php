<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class USD extends Model
{
    protected $table = 'usd';
    public function title()
    {
        return 'دلار آمریکا';
    }
}
