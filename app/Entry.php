<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Entry extends Model
{
    protected $dates = [
        'published_at',
    ];

    public function feed()
    {
        return $this->belongsTo('App\Feed');
    }

    public static function fetchEntries($feed_id)
    {
        $feed = Feed::find($feed_id);

        $pie = new \SimplePie();
        $pie->set_cache_location(storage_path('simplepie/cache'));
        $pie->set_feed_url($feed->url);
        if (!$pie->init()) return false;
        $pie->handle_content_type();

        $now = new \DateTime();
        $items = $pie->get_items();
        $new_entries = collect();

        foreach ($items as $item) {
            if (!$feed->entries()->where('url', $item->get_link())->exists())
            {
                $new_entries->push([
                    'feed_id'      => $feed_id,
                    'title'        => $item->get_title(),
                    'url'          => $item->get_link(),
                    'published_at' => new \DateTime($item->get_date()),
                    'created_at'   => $now,
                    'updated_at'   => $now
                ]);
            }
        }

        if (!$new_entries->isEmpty())
            self::insert($new_entries->toArray());
    }
}
