@if (session()->has('success'))  
    <div id="alert-userinfo" class="flex p-4 mb-4 bg-green-100 rounded-lg dark:bg-green-200" role="alert" 
        x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 3000)">
        <svg aria-hidden="true" class="flex-shrink-0 w-5 h-5 text-green-700 dark:text-green-800" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path>
        </svg>
        <span class="sr-only">Info</span>
        <div class="ml-3 text-sm font-medium text-green-700 dark:text-green-800">
            {{ session('success') }}
        </div>
    </div>
@endif