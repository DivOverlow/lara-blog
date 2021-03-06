<?php

namespace App\Model\frontend;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class post extends Model
{
    public function tags()
    {
        return $this->belongsToMany(tag::class, 'post_tags');
    }

    public function categories()
    {
        return $this->belongsToMany(category::class, 'category_posts');
    }

    public function getRouteKeyName()
    {
        return 'slug'; // TODO: Change the autogenerated stub
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->diffForHumans();
    }

    public function likes()
    {
        return $this->hasMany('App\Model\frontend\like');
    }

    public function getSlugAttribute($value)
    {
        return route('post', $value);
    }
}
