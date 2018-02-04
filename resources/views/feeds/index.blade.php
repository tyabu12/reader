@extends('layouts.app')

@section('title', __('All Feeds'))

@section('content')
<div class="container">
    <div class="row">
        <h1>{{ __('All Feeds') }}</h1>
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('Name') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($feeds as $feed)
                    <tr>
                        <td><a href="{{ url('feeds/'.$feed->id) }}">{{ $feed->name }}</a></td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
