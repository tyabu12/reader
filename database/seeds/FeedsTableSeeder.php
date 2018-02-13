<?php

use App\Feed;
use Illuminate\Database\Seeder;

class FeedsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $feed_urls = [
          'http://feeds.lifehacker.jp/rss/lifehacker/index.xml',
          'http://www.huffingtonpost.jp/rss/index.xml',
          'https://berss.com/feed/Top.aspx?feed=http://portal.nifty.com/rss/headline.rdf',
          'https://rocketnews24.com/feed/',
          'https://digiday.jp/feed/',
          'http://blog.livedoor.jp/dqnplus/index.rdf',
          'http://gigazine.net/news/rss_2.0/',
          'http://feed.japan.cnet.com/rss/index.rdf',
          'http://blogos.com/rss/blogos/summary.xml',
          'http://itlifehack.jp/atom.xml'
        ];

        foreach ($feed_urls as $feed_url)
        {
            $feed = new Feed();
            $feed->fetch($feed_url, false);
        }
    }
}
