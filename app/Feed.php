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

    public function fetch($feed_url, $use_cache = true)
    {
        $pie = new \SimplePie();
        $pie->enable_cache($use_cache);
        $pie->set_cache_location(storage_path('simplepie/cache'));
        $pie->set_cache_duration(env('FEED_CACHE_DURATION'));
        $pie->set_feed_url($feed_url);
        if (!$pie->init()) return false;
        $pie->handle_content_type();

        $this->name = $pie->get_title() ? $pie->get_title() : '';
        #$this->author =$pie->get_author() ? $pie->get_author() : '';
        $this->feed_url = $pie->subscribe_url() ? $pie->subscribe_url() : $feed_url;
        $this->link_url = $pie->get_link() ? $pie->get_link() : '';

        $this->save();

        return $this;
    }

    public static function fetchAllFeeds($use_cache = true)
    {
        $feeds = Feed::all(['feed_url']);

        foreach ($feeds as $feed)
            $feed->fetch($feed->feed_url, $use_cache);
    }
}
