@php
    $now = now();
@endphp
<div class="row row-eq-height">
    @foreach ($entries as $entry)
        <div class="col-sm-3 col-xs-6">
<div class="entry">
            <div class="title">
                <h4 title="{{ $entry->title }}">
                    <a href="{{ url($entry->url) }}">{{ str_limit($entry->title, 80) }}</a>
                </h4>
            </div>
            <div class="feed-name" title="{{ $entry->feed->name }}">
                <a href="{{ url('feeds/'.$entry->feed->id) }}">{{ str_limit($entry->feed->name, 30) }}</a>
            </div>
            <div class="published-at" title="{{ $entry->published_at }}">
                {{ $entry->published_at->diffForHumans() }}
            </div>
</div>
        </div>
    @endforeach
</div>
<div class="text-right">{{ $entries->links() }}</div>
