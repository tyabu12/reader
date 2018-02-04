@extends('layouts.app')

@section('title', __('Entry Detail'))

@section('content')
<div class="container">
    <h1>{{ $entry->title }}</h1>
    <dl class="row">
        <dt class="col-md-2">{{ __('ID') }}</dt>
        <dd class="col-md-10">{{ $entry->id }}</dd>
        <dt class="col-md-2">{{ __('Feed Name') }}</dt>
        <dd class="col-md-10"><a href="{{ url('/feeds/'.$entry->feed->id) }}">{{ $entry->feed->name }}</a></dd>
        <dt class="col-md-2">{{ __('Published at') }}</dt>
        <dd class="col-md-10">{{ $entry->published_at }}</dd>
        <dt class="col-md-2">{{ __('URL') }}</dt>
        <dd class="col-md-10"><a href="{{ url($entry->url) }}">{{ $entry->url }}</a></dd>
    </dl>
</div>
@endsection
