@extends('layouts.app')

@section('title', __('All Entries'))

@section('content')
<div class="container">
    <div class="row">
        <h1>{{ __('All Entries') }}</h1>
        @component('components.entries-show')
            @slot('entries', $entries)
        @endcomponent
    </div>
</div>
@endsection
