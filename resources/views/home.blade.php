@extends('layouts.app')

@section('title', __('Home'))

@section('content')
<div class="container">
    <div class="row">
        <h1>{{ __('Latest') }}</h1>
        @component('components.entries-show')
            @slot('entries', $entries)
        @endcomponent
    </div>
</div>
@endsection
