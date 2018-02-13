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

    public static function fetchEntries($feed_id, $use_cache = true)
    {
        $feed = Feed::find($feed_id);

        $pie = new \SimplePie();
        $pie->enable_cache($use_cache);
        $pie->set_cache_location(storage_path('simplepie/cache'));
        $pie->set_cache_duration(env('FEED_CACHE_DURATION'));
        $pie->set_feed_url($feed->feed_url);
        if (!$pie->init()) return false;
        $pie->handle_content_type();

        $now = new \DateTime();
        $items = $pie->get_items();
        $new_entries = collect();

        foreach ($items as $item) {
            if (!$feed->entries()->where('url', $item->get_link())->exists())
            {
                $thumbnail_url = null;
                if ($enclosure = $item->get_enclosure(0))
                {
                    $thumbnail_url = $enclosure->get_thumbnail();
                    if (!$thumbnail_url
                        && $enclosure->get_link()
                        && stristr($enclosure->get_type(), 'image/'))
                    {
                        $thumbnail_url = $enclosure->get_link();
                    }
                }
                if (!$thumbnail_url)
                {
                    if (preg_match( '/<img.*src\s*=\s*[\"|\'](.*?)[\"|\'].*>/i', $item->get_content(), $matches)
                        && is_array($matches)
                        && isset($matches[1]))
                    {
                        $thumbnail_url = $matches[1];
                    }
                }

                $new_entries->push([
                    'feed_id'       => $feed_id,
                    'title'         => $item->get_title(),
                    'url'           => $item->get_link(),
                    'thumbnail_url' => $thumbnail_url,
                    'published_at'  => new \DateTime($item->get_date()),
                    'created_at'    => $now,
                    'updated_at'    => $now
                ]);
            }
        }

        if (!$new_entries->isEmpty())
            self::insert($new_entries->toArray());
    }

    public static function fetchAllEntries($use_cache = true)
    {
        $feeds = Feed::all(['id']);

        foreach ($feeds as $feed)
            self::fetchEntries($feed->id, $use_cache);
    }
}
