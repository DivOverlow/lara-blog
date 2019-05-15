<?php

namespace App\Model\frontend;

use Illuminate\Database\Eloquent\Model;

class tag extends Model
{
    public function posts()
    {
        return $this->belongsToMany(post::class, 'post_tags')
            ->orderBy('created_at', 'DESC')->paginate(5);
    }

    public function getRouteKeyName()
    {
        return 'tag';
    }

}
