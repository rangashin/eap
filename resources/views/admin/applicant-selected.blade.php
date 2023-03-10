<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Manage Applicants - Selected for Interview') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-message/>
            <x-error-message/>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('admin.applicant.selected.update') }}" method="post">
                        @csrf
                        <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                            <ol class="inline-flex items-center space-x-1 md:space-x-3">
                                <li class="inline-flex items-center">
                                    <a href="{{ route('admin.applicant.index') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                        <svg stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2" fill="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path></svg>
                                    Applicants
                                    </a>
                                </li>
                                <li>
                                    <div class="flex items-center">
                                        <svg class="w-6 h-6 text-gray-400" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd"></path></svg>
                                        <a href="{{ route('admin.applicant.selected.index') }}" class="ml-1 text-sm font-medium text-gray-700 hover:text-gray-900 md:ml-2 dark:text-gray-400 dark:hover:text-white">Selected for Interview</a>
                                    </div>
                                </li>
                            </ol>
                        </nav>
                        <div class="flex justify-between items-center py-4 bg-white">
                            <div class="flex items-center">
                                <select id="applicantstatus" name="applicantstatus" class="block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm hidden " placeholder="Change To" >
                                    <option value="" disabled hidden selected >Change To</option>
                                    <option value="4">Rejected</option>
                                    <option value="5">Accepted</option>
                                </select>
                                <div>
                                    <x-primary-button class="text-sm ml-3 hidden " name="confirmChanges" id="confirmChanges">
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
                                    <th scope="col" class="py-3 px-6">Contact Number</th>
                                    <th scope="col" class="py-3 px-6">Grade Year or Level</th>
                                    <th scope="col" class="py-3 px-6">Date of Selection</th>
                                    <th scope="col" class="py-3 px-6">Interview Date</th>
                                    <th scope="col" class="py-3 px-6">Kawan</th>  
                                </tr>
                            </thead>
                            @foreach ($applicants as $applicant)
                                <tbody>
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="py-4 px-6 space-x-4 text-base font-semibold text-black"><input type="checkbox" name="userCheckbox[]" id="userCheckbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" value="{{ $applicant->user_id }}"></td>
                                        <td class="py-4 px-6 space-x-4 text-base font-semibold text-black uppercase">{{ $applicant->full_name }}</td>
                                        <td class="py-4 px-6 space-x-4">{{ $applicant->applicantcontactno }}</td>
                                        <td class="py-4 px-6 space-x-4">{{ $applicant->gradeyearorlevel }}</td>
                                        <td class="py-4 px-6 space-x-4">{{ $applicant->hasbeenselecteddate }}</td>
                                        <td class="py-4 px-6 space-x-4">{{ !empty($applicant->interviewdate) ? $applicant->interviewdate : 'Not yet set'}}</td>
                                        <td class="py-4 px-6 space-x-4">{{ $applicant->kawan->kawanname }}</td>
                                    </tr>
                                </tbody>
                            @endforeach                       
                        </table>
                        <br>
                        {{ $applicants->links() }}
                        @if (count($applicants) == 0)
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