<?php

namespace App\Http\Controllers;

use App\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FeedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feeds = Feed::latest()->get();

        return view('feeds.index', ['feeds' => $feeds]);
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
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function show(Feed $feed)
    {
        return view('feeds.show', ['feed' => $feed]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function edit(Feed $feed)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Feed $feed)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function destroy(Feed $feed)
    {
        //
    }

    /**
     * Subscribe the feed.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function subscribe(Request $request)
    {
        $this->middleware('auth');

        $feed_url = $request->feed_url;
        $feed = Feed::where('feed_url', $feed_url)
            ->first(['id', 'name']);

        if (!$feed)
        {
            $feed = new feed();

            if (!$feed->fetch($feed_url))
                return redirect()->back()
                    ->with('message', 'invalid url.');

            entry::fetchentries($feed->id);
        }

        auth::user()->feeds()->attach($feed->id);

        return redirect()->back();
    }

    /**
     * Unsubscribe the feed.
     *
     * @param  \App\Feed  $feed
     * @return \Illuminate\Http\Response
     */
    public function unsubscribe(Request $request)
    {
        $this->middleware('auth');

        $feed_url = $request->feed_url;
        $feed = Feed::where('feed_url', $feed_url)
            ->first(['id', 'name']);

        if ($feed)
            Auth::user()->feeds()->detach($feed->id);

        return redirect()->back();
    }
}
