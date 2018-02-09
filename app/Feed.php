<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Feed extends Model
{
    public function entries()
    {
        return $this->hasMany('App\Entry');
    }

    public function users()
    {
        return $this->belongsToMany('App\User', 'subscribes')
            ->withTimestamps();
    }

    public function fetch($feed_url)
    {
        $pie = new \SimplePie();
        $pie->set_cache_location(storage_path('simplepie/cache'));
        $pie->set_cache_duration(60);
        $pie->set_feed_url($feed_url);
        if (!$pie->init()) return false;
        $pie->handle_content_type();

        $this->name = $pie->get_title() ? $pie->get_title()  : '';
        #$this->author =$pie->get_author() ? $pie->get_author() : '';
        $this->url = $pie->subscribe_url() ? $pie->subscribe_url() : $feed_url;
        #$this->url = $pie->get_link() ? $pie->get_link()   : '';

        $this->save();

        return $this;
    }
}
