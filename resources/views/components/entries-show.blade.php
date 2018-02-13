<div class="row">
    @foreach ($entries as $entry)
        <div class="col-sm-4 col-xs-6 entry
            {{ $entry->thumbnail_url ? 'with-img' : 'without-img' }}">
            @if ($entry->thumbnail_url)
                <img class="thumbnail" src="{{ $entry->thumbnail_url }}" alt=""></img>
            @endif
                <h3 class="title" title="{{ $entry->title }}">
                    <a href="{{ url($entry->url) }}" target="_blank">
                        {{ str_limit($entry->title, 60) }}
                    </a>
                </h3>
                <div class="row footer">
                    <div class="col-sm-7 feed-name" title="{{ $entry->feed->name }}">
                        <a href="{{ url('entries/?feed_id='.$entry->feed->id) }}">{{ $entry->feed->name }}</a>
                    </div>
                    <div class="col-sm-5 hidden-xs published-at" title="{{ $entry->published_at }}">
                        {{ $entry->published_at->diffForHumans() }}
                    </div>
                </div>
        </div>
    @endforeach
</div>
<div class="text-right">{{ $entries->links() }}</div>
