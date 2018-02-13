@extends('layouts.app')

@section('title', __('Home'))

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1><a href="{{ url(route('home')) }}">{{ __('Latest Entries') }}</a></h1>
            </div>
            <div class="panel-body no-top-padding">
                @component('components.entries-show')
                    @slot('entries', $entries)
                @endcomponent
            </div>
        </div>
    </div>
</div>
@endsection
