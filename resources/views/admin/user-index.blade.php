<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Users') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-message/>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <div class="flex justify-between items-center py-4 bg-white">
                        <div>
                            <x-primary-button type="button" class="focus:border-gray-900 focus:ring ring-gray-300 disabled:opacity-25 ml-3"> 
                                <a href="{{ route('admin.user.create') }}">
                                    {{ __('Add New User') }}
                                </a>
                            </x-primary-button>
                        </div>

                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" id="table-search-users" class="block p-2 pl-10 w-80 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for users">
                        </div>
                    </div>
                    
                    <table class="w-full text-sm text-left text-gray-500" id="mainTable">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                            <tr id="head"> 
                                <th scope="col" class="py-3 px-6">Username</th>
                                <th scope="col" class="py-3 px-6">Contact Number</th>
                                <th scope="col" class="py-3 px-6">Email</th>
                                <th scope="col" class="py-3 px-6">Role Type</th>    
                                <th scope="col" class="py-3 px-6 text-center">Action</th>
                            </tr>
                        </thead>
                        @foreach ($users as $user)
                            <tbody>
                                <tr class="bg-white border-b hover:bg-gray-50">
                                    <td class="py-4 px-6 space-x-4">
                                        <a href="{{ route('admin.user.show', $user->id) }}" class="text-gray-900 hover:text-yellow-300">
                                            <div class="text-base font-semibold">{{ $user->username }}</div>
                                        </a>
                                    </td>
                                    <td class="py-4 px-6 space-x-4">{{ $user->contactno }}</td>
                                    <td class="py-4 px-6 space-x-4">{{ $user->email }}</td>
                                    <td class="py-4 px-6 space-x-4">{{ $user->role->roletype }}</td>
                                    <td class="flex py-4 px-6 space-x-4 justify-center">              
                                        <x-a-link :href="route('admin.user.edit', $user->id)">{{ __('Edit') }}</x-a-link>
                                        <form action="{{ route('admin.user.destroy', $user->id) }}" method="post" class="cursor-pointer">
                                            @csrf
                                            @method('DELETE')
                                            <x-a-link-red>   
                                                <button type="submit">{{ __('Delete') }}</button>   
                                            </x-a-link-red>
                                        </form>
                                    </td>
                                </tr>
                            </tbody>
                        @endforeach
                        @if (count($users) == 0)
                            <div class="py-6 px-3 bg-white  hover:bg-gray-50">
                                <p class="font-black text-xl text-gray-700">{{ 'No data' }}</p>
                            </div>
                        @endif
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>