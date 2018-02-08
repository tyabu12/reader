<?php

use App\Feed;
use App\Entry;
use Illuminate\Database\Seeder;

class EntriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        foreach (Feed::all() as $feed)
            Entry::fetchEntries($feed->id);
    }
}
