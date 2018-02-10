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
                <h1>{{ $title }}</h1>
                @auth
                    @if ($feed && $is_subscring)
                        <form method="POST" action="{{ route('feed.unsubscribe') }}">
                            {{ csrf_field() }}
                            <input type='hidden' name="feed_url" value="{{ $feed->url }}"></input>
                            <button type="submit" class="btn btn-primary">{{ __('Unsubscribe') }}</button>
                        </form>
                    @elseif ($feed && !$is_subscring)
                        <form method="POST" action="{{ route('feed.subscribe') }}">
                            {{ csrf_field() }}
                            <input type='hidden' name="feed_url" value="{{ $feed->url }}"></input>
                            <button type="submit" class="btn btn-primary">{{ __('Subscribe') }}</button>
                        </form>
                    @endif
                @endauth
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
