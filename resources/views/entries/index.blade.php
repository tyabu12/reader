@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>{{ __('Feed Name') }}</th>
                        <th>{{ __('Title') }}</th>
                        <th>{{ __('Published at') }}</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($entries as $entry)
                    <tr>
                        <td><a href="{{ url('feeds/'.$entry->feed->id) }}">{{ $entry->feed->name }}</a></td>
                        <td><a href="{{ url('entries/'.$entry->id) }}">{{ $entry->title }}</a></td>
                        <td>{{ $entry->published_at }}</td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
