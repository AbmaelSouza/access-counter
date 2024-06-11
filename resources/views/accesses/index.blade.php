<h1>Access Statistics</h1>
<p>You've had {{ $accessCount }} accesses in the last 30 days from {{ $uniqueIpCount }} unique IPs.</p>

<h2>Accesses by City</h2>
<ul>
    @foreach ($accessesByLocation as $access)
        <li>{{ $access['city']}}, {{ $access["region"] }}, {{ $access["country"] }}: {{ $access["count"] }} (last access :{{ $access['timeAgo'] }} ago)</li>
    @endforeach
</ul>
