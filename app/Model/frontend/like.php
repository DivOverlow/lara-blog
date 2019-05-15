<?php

namespace App\Model\frontend;

use Illuminate\Database\Eloquent\Model;

class like extends Model
{
    public function post()
    {
        return $this->belongsTo('App\Model\frontend\post','like');
    }
}
