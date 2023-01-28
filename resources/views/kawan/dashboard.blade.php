<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    
                    <div class="flex justify-end items-center py-4  bg-white"> 
                        <label for="table-search" class="sr-only">Search</label>
                        <div class="relative">
                            <div class="flex absolute inset-y-0 left-0 items-center pl-3 pointer-events-none">
                                <svg class="w-5 h-5 text-gray-500" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z" clip-rule="evenodd"></path></svg>
                            </div>
                            <input type="text" id="table-search-users" class="block p-2 pl-10  text-sm lg:w-80 md:w-60 sm:w-50 text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500" placeholder="Search for users">
                        </div>
                    </div>

                    <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                        <table class="min-w-full border-collapse block md:table text-sm text-gray-800" id="applicantsTable">
                            <thead class="block md:table-header-group uppercase">
                                <tr class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative" id="head">
                                    <th class="bg-gray-100 p-2 text-gray-800 text-xs font-bold md:border md:border-grey-500 text-left block md:table-cell">Name</th>
                                    <th class="bg-gray-100 p-2 text-gray-800 text-xs font-bold md:border md:border-grey-500 text-left block md:table-cell">Contact Number</th>
                                    <th class="bg-gray-100 p-2 text-gray-800 text-xs font-bold md:border md:border-grey-500 text-left block md:table-cell">Grade or Year Level</th>
                                    <th class="bg-gray-100 p-2 text-gray-800 text-xs font-bold md:border md:border-grey-500 text-left block md:table-cell">Date of Selection</th>
                                    <th class="bg-gray-100 p-2 text-gray-800 text-xs font-bold md:border md:border-grey-500 text-left block md:table-cell">Interview Date</th>
                                    <th class="bg-gray-100 p-2 text-gray-800 text-xs font-bold md:border md:border-grey-500 text-left block md:table-cell">Kawan</th>
                                </tr>
                            </thead>
                            @foreach ($applicants as $applicant)
                            <tbody class="block md:table-row-group">
                                <tr class="bg-white border border-grey-500 md:border-none block md:table-row hover:bg-gray-50">
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell text-base font-semibold text-black uppercase"><span class="inline-block w-1/3 md:hidden font-bold">Name:</span>{{ $applicant->full_name }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell uppercase"><span class="inline-block w-1/3 md:hidden font-bold">Contact Number:</span>{{ $applicant->applicantcontactno }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell uppercase"><span class="inline-block w-1/3 md:hidden font-bold">Grade or Year Level:</span>{{ $applicant->gradeyearorlevel }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell uppercase"><span class="inline-block w-1/3 md:hidden font-bold">Date of Selection:</span>{{ $applicant->hasbeenselecteddate }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell uppercase"><span class="inline-block w-1/3 md:hidden font-bold">Interview Date:</span>{{ $applicant->interviewdate ?? 'Not yet set' }}</td>
                                    <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell uppercase"><span class="inline-block w-1/3 md:hidden font-bold">Kawan:</span>{{ $applicant->kawan->kawanname }}</td>   
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function(){
            $("#table-search-users").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                $("#applicantsTable tr").filter(function() {
                    $('#head').show();
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });
        });
    </script>
</x-app-layout>