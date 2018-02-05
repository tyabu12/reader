@extends('layouts.app')

@section('title', __('All Entries'))

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>{{ __('All Entries') }}</h1>
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
