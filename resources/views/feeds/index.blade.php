@extends('layouts.app')

@section('title', __('All Feeds'))

@section('content')
<div class="container">
    <div class="row">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h1>{{ __('All Feeds') }}</h1>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped">
                        <tbody>
                        @foreach ($feeds as $feed)
                            <tr>
                                <td><a href="{{ url('entries/?feed_id='.$feed->id) }}">{{ $feed->name }}</a></td>
                                <td><a href="{{ url($feed->feed_url) }}">{{ $feed->feed_url }}</a></td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
