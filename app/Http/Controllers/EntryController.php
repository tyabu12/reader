<?php

namespace App\Http\Controllers;

use App\Feed;
use App\Entry;
use App\Subscribe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EntryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $feed_id = $request->get('feed_id');
        $feed = Feed::find($feed_id);

        $entries = Entry::with('feed:id,name');

        if ($feed)
        {
            $entries = $entries->where('feed_id', $feed->id);
            $is_subscring = Auth::check() ? Auth::user()->isSubscribing($feed) : false;
        }
        else
        {
            $is_subscring = null;
        }

        $entries = $entries->orderByDesc('published_at')
            ->simplePaginate(env('MAX_ENTRIES_PER_PAGE'));

        return view('entries.index', [
            'feed' => $feed,
            'entries' => $entries,
            'is_subscring' => $is_subscring
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function show(Entry $entry)
    {
        return view('entries.show', ['entry' => $entry]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function edit(Entry $entry)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Entry $entry)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Entry  $entry
     * @return \Illuminate\Http\Response
     */
    public function destroy(Entry $entry)
    {
        //
    }
}
