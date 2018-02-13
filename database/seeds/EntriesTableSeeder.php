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
        Entry::fetchAllEntries(false);
    }
}
