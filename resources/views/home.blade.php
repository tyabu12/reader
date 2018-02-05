@extends('layouts.app')

@section('title', __('Home'))

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>{{ __('Latest') }}</h1>
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
