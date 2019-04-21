<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Lir extends Model
{
    protected $table = 'lir';
    public function title()
    {
        return 'لیر ترکیه';
    }
}
