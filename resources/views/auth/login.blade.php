<x-app-layout>



<form method="POST" action="{{ route('login.store') }}">
 

    @csrf
  <div class="space-y-12">
    <div class="border-b border-gray-900/10 pb-12">
      
      <div class="mt-10 grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">
        <div class="sm:col-span-4">
          <x-form-label for="email">Email</x-form-label>
          <div class="mt-2">
            <x-form-input value="{{old('email')}}" name="email" id="email" required autocomplete="false" placeholder="e.g. westrick" />
          </div>
            <x-form-error name="email" />
        </div>
    
        <div class="sm:col-span-4">
            <x-form-label for="password">Password</x-form-label>
            <div class="mt-2">
            <x-form-input type="password" name="password" type="password" id="password" required placeholder="******" />
            </div>

           <x-form-error name="password" />
        </div>

      </div>
    </div>


  </div>

  <div class="mt-6 flex items-center justify-end gap-x-6">
    <button type="button" class="text-sm/6 font-semibold text-gray-900">Cancel</button>
    <button type="submit" class="rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600">Login</button>
  </div>
</form>
</x-app-layout>