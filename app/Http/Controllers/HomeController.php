<?php

namespace App\Http\Controllers;

use App\User;
use App\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $feed_ids = Auth::user()
            ->feeds()
            ->get(['feed_id'])
            ->pluck('feed_id')
            ->toArray();

        $entries = Entry::with('feed:id,name')
            ->whereIn('feed_id', $feed_ids)
            ->orderByDesc('published_at')
            ->simplePaginate(env('MAX_ENTRIES_PER_PAGE'));

        return view('home', ['entries' => $entries]);
    }
}
