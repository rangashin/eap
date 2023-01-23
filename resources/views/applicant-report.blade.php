<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Applicants Report Page') }}
        </h2>
    </x-slot>

    <!-- Wala pang backend, di pa kinukuha sa database yung info -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- FLASH MESSAGE --}}

            {{-- <x-dropdown-error :messages="$errors->get('applicantstatus')" class="mt-2" />
            <x-dropdown-error :messages="$errors->get('datespan')" class="mt-2" /> --}}
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    {{-- <nav class="flex px-5 py-3 text-gray-700 border border-gray-200 rounded-lg bg-gray-50 dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
                        <ol class="inline-flex items-center space-x-1 md:space-x-3">
                            <li class="inline-flex items-center">
                                <a href="{{route('admin.applicant.index') /* ROUTE ITSELF */}}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                                    <svg stroke-linecap="round" stroke-linejoin="round" class="w-4 h-4 mr-2" fill="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path></svg>
                                Applicants
                                </a>
                            </li>
                        </ol>
                    </nav> --}}

                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <div class="flex justify-between items-center py-4 px-10 bg-white">    
                                <form action="{{-- route('admin.pdfapplicants') --}}" method="post">
                                    @csrf              
                                    <div class="flex items-center">
                                        
                                        <select id="applicantstatus" name="applicantstatus" class="block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm mr-3 " placeholder="Change To" >
                                            <option value="" disabled hidden selected >Create Report for...</option>
                                            <option value="2">All Applicants</option>
                                            <option value="3">Under Review</option>
                                            <option value="4">Selected For Interview</option>
                                            <option value="5">Rejected</option>
                                        </select>
                                        <select id="datespan" name="datespan" class="block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm " placeholder="Change To" >
                                            <option value="" disabled hidden selected >Select Date Range...</option>
                                            <option value="1">Last 7 Days</option>
                                            <option value="2">Last Month</option>
                                            
                                        </select>
                                        <x-primary-button class="text-sm ml-3 " name="confirmChanges" id="confirmChanges">
                                            {{ __('Generate Report') }}
                                        </x-primary-button>
                                        
                                    </div>
                                </form>
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
                                        {{-- <th scope="col" class="py-3 px-6"><input type="checkbox" name="mainCheckbox" id="mainCheckbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" ></th> --}}
                                        <th scope="col" class="py-3 px-6">Name</th>
                                        <th scope="col" class="py-3 px-6">Renewal Status</th>
                                        <th scope="col" class="py-3 px-6">Incoming Year Level</th>  
                                        <th scope="col" class="py-3 px-6">General Average</th>      
                                        <th scope="col" class="py-3 px-6">Family Total Income</th>
                                        <th scope="col" class="py-3 px-6">Applicant Status</th>
                                        <th scope="col" class="py-3 px-6">View</th>
                                    </tr>
                                </thead>
                                <tbody>
                                {{-- @foreach ($applicants as $applicant)
                                    <tr class="bg-white border-b hover:bg-gray-50">
                                        <td class="py-4 px-6 space-x-4 text-base font-semibold text-black uppercase">{{ $applicant->full_name }}</td>
                                        <td class="py-4 px-6 space-x-4 uppercase">{{ $applicant->renewal }}</td>
                                        <td class="py-4 px-6 space-x-4 uppercase">{{ $applicant->gradeyearorlvl }}</td>
                                        <td class="py-4 px-6 space-x-4">{{ $applicant->genave }}</td>
                                        <td class="py-4 px-6 space-x-4">{{ '₱'.number_format($applicant->family_total_income, 2) }}</td>
                                        <td class="py-4 px-6 space-x-4">{{ $applicant->applicantStatus->status }}</td>
                                        <td class="py-4 px-6 space-x-4">
                                            <x-a-link :href="route('admin.applicant.review.show', $applicant->applicant_id)">   
                                                {{ __('View') }}
                                            </x-a-link>
                                        </td>
                                    </tr>
                                @endforeach --}}
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- <script>
        $(document).ready(function(){
            $("#table-search-users").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#applicantsTable tr").filter(function() {
                    $('#head').show();
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script> --}}
</x-app-layout>