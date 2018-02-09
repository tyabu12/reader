<?php

namespace App\Console\Commands;

use App\Entry;
use Illuminate\Console\Command;

class SyncEntries extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'entries:sync';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Syncronize all feed entries';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        Entry::fetchAllEntries();

        \Log::info($this->name . ' has executed at ' . now() . '.');
    }
}
