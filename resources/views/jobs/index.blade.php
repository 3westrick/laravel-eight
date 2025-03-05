<x-app-layout>
    <x-slot:heading>
        Jobs
    </x-slot:heading>
    <x-slot:title>
        Jobs List
    </x-slot:title>
    <div class="space-y-4">
    @foreach ($jobs as $job )
        <a href="{{ route('jobs.show', $job->id ) }}" class="block px-4 py-6 border border-border rounded-lg">
            <div class="text-blue-500 font-bold">
                {{ $job->employer->name }}
            </div>
            <div>
                <strong>{{ $job->title }}</strong> pays: {{ $job->salary }} per year.
            </div>
        </a>
    @endforeach
    </div>

    <div>
        {{$jobs->links()}}
    </div>
</x-app-layout>