@extends('layouts.app')

@php
    $title = $feed ? $feed->name :  __('All Entries');
@endphp

@section('title', $title)

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                @if (!$feed)
                    <h1>{{ $title }}</h1>
                @else
                    <h1><a href="{{ url($feed->link_url) }}">{{ $title }}</a></h1>
                    @auth
                        @if ($is_subscring)
                            <form class="text-right" method="POST" action="{{ route('feed.unsubscribe') }}">
                                {{ csrf_field() }}
                                <input type='hidden' name="feed_url" value="{{ $feed->feed_url }}"></input>
                                <button type="submit" class="btn btn-danger">{{ __('Unsubscribe') }}</button>
                            </form>
                        @else
                            <form class="text-right" method="POST" action="{{ route('feed.subscribe') }}">
                                {{ csrf_field() }}
                                <input type='hidden' name="feed_url" value="{{ $feed->feed_url }}"></input>
                                <button type="submit" class="btn btn-primary">{{ __('Subscribe') }}</button>
                            </form>
                        @endif
                    @endauth
                @endif
            </div>
            <div class="panel-body">
                @component('components.entries-show')
                    @slot('entries', $entries)
                @endcomponent
            </div>
        </div>
    </div>
</div>
@endsection
