<div>
    <h1>Just created {{ $job->title }}</h1>
    <a href="{{ url(route('jobs.show', $job->id)) }}">View your job</a>
</div>
