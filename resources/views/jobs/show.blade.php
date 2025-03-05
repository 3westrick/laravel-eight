<x-app-layout>
    <x-slot:title>
        Jobs | {{$job->title}}
    </x-slot:title>
    <x-slot:heading>
        Jobs #{{$job->id}} | {{$job->title}}
    </x-slot:heading>
    <div class="">
        <p>{{$job->title}}: {{$job->salary}}</p>
        
        @can('delete', $job)
        <form action="{{ route('jobs.destroy', $job->id) }}" method="POST">
            @csrf
            @method('DELETE')
            <button class="btn delete">Delete</button>
        </form>
        @endcan

        @can('edit', $job)
        <x-button href="{{ route('jobs.edit', $job->id ) }}">Edit</x-button>
        @endcan
    </div>
</x-app-layout>