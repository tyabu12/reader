@php
    use Carbon\Carbon;
    Carbon::setLocale(config('app.locale'));
    $now = new Carbon();
@endphp
<div class="table-responsive">
    <table class="table table-striped table-hover table-condensed">
        <tbody>
        @foreach ($entries as $entry)
            <tr onclick="window.location='{{ url($entry->url) }}';">
                <td><a href="{{ url('feeds/'.$entry->feed->id) }}">{{ $entry->feed->name }}</a></td>
                <td><a href="{{ url($entry->url) }}">{{ $entry->title }}</a></td>
                <td><div class="text-right">{{ $entry->published_at->diffForHumans($now, true) }}</div></td>
            </a></tr>
        @endforeach
        </tbody>
    </table>
    {{ $entries->links() }}
</div>
