@extends('layouts.app')

@section('title', __('Feed Detail'))

@section('content')
<div class="container">
    <h1>{{ $feed->name }}</h1>
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $feed->id }}</dd>
        <dt class="col-md-2">{{ __('Feed URL') }}</dt>
        <dd class="col-md-10"><a href="{{ url($feed->feed_url) }}">{{ $feed->feed_url }}</a></dd>
        <dt class="col-md-2">{{ __('Link URL') }}</dt>
        <dd class="col-md-10"><a href="{{ url($feed->link_url) }}">{{ $feed->link_url }}</a></dd>
    </dl>
</div>
@endsection
