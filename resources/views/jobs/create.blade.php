<x-app-layout>



<form method="POST" action="{{ route('jobs.store') }}">
    {{-- @if ($errors->any())
    <div class="p-4 mb-4 text-sm text-red-800 rounded-lg bg-red-50 dark:bg-gray-800 dark:text-red-400" role="alert">
    @foreach ($errors->all() as $error)
        <p>{{$error}}</p>
    @endforeach
    </div>
    @endif --}}

    @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      <h2 class="text-base/7 font-semibold text-gray-900">Create a new job</h2>
      <p class="mt-1 text-sm/6 text-gray-600">Just fill some handfull details.</p>

      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <x-form-label for="title">Title</x-form-label>
          <div class="mt-2">
            <x-form-input name="title" id="title" required placeholder="e.g. CEO" />
          </div>
            <x-form-error name="title" />
        </div>

        
        <div class="sm:col-span-4">
            <x-form-label for="salary">Salary</x-form-label>
            <div class="mt-2">
            <x-form-input name="salary" id="salary" required placeholder="$ per year" />
            </div>

           <x-form-error name="salary" />
        </div>
    

      </div>
    </div>


  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Save</button>
  </div>
</form>
</x-app-layout>