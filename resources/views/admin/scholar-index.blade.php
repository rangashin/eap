<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Scholars') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-message/>
            <x-error-message/>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.scholar.updatestatus') }}" method="post">
                        @csrf
                        <div class="flex justify-between items-center py-4 bg-white"> 
                            <div class="flex items-center">
                                <select id="applicantstatus" name="scholarstatus" class="block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm hidden " placeholder="Change To" >
                                    <option value="" disabled hidden selected >Change Scholar Status To</option>
                                    <option value="R">Regular</option>
                                    <option value="C">Conditional</option>
                                    <option value="I">Incomplete</option>
                                </select>
                                <div>
                                    <x-primary-button class="text-sm ml-3 hidden " id="confirmChanges">
                                        {{ __('Confirm Changes') }}
                                    </x-primary-button>
                                </div>
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
                                    <th scope="col" class="py-3 px-6"><input type="checkbox" name="mainCheckbox" id="mainCheckbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" ></th>
                                    <th scope="col" class="py-3 px-6">Name</th>
                                    <th scope="col" class="py-3 px-6">Kawan</th>
                                    <th scope="col" class="py-3 px-6">Year Level</th>
                                    <th scope="col" class="py-3 px-6">Scholar Status</th>  
                                    <th scope="col" class="py-3 px-6">Action</th>    
                                </tr>
                            </thead>
                            @foreach ($scholars as $scholar)
                                <tbody>
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="py-4 px-6 space-x-4 text-base font-semibold text-black"><input type="checkbox" name="userCheckbox[]" id="userCheckbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="{{ $scholar->id }}" /></td>
                                        <td class="py-4 px-6 space-x-4 text-base font-semibold text-black uppercase">{{ $scholar->applicant->full_name }}</td>
                                        <td class="py-4 px-6 space-x-4 uppercase">{{ $scholar->applicant->kawan->kawanname }}</td>
                                        <td class="py-4 px-6 space-x-4">{{ $scholar->applicant->gradeyearorlevel }}</td>
                                        <td class="py-4 px-6 space-x-4 uppercase">{{ $scholar->applicant->scholar->scholarStatus->status }}</td>
                                        <td class="py-4 px-6 space-x-4">
                                            <x-a-link href="{{ route('admin.scholar.show', $scholar->id) }}">   
                                                {{ __('View') }}
                                            </x-a-link>
                                        </td> 
                                    </tr>
                                </tbody>
                            @endforeach                       
                        </table>
                        <br>
                        {{ $scholars->links() }}
                        @if (count($scholars) == 0)
                            <div class="py-6 px-3 bg-white  hover:bg-gray-50">
                                <p class="font-black text-xl text-gray-700">{{ 'No data' }}</p>
                            </div>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>