<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Kawan Dashboard') }}
        </h2>
    </x-slot>

    <!-- Wala pang backend, di pa kinukuha sa database yung info -->
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">

            {{-- FLASH MESSAGE --}}

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    

                    <div class="p-6 bg-white border-b border-gray-200">
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            
                            <div class="flex justify-between items-center py-4 px-10 bg-white">
                                <form action="{{-- route('admin.kawan.interviews') --}}" method="post">
                                    @csrf                 
                                    <div class="flex items-center">
                                        <select id="interviewlist" name="interviewlist" class="block border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm " placeholder="Change To" >
                                            <option value="" disabled hidden selected >Select a Date</option>
                                            <option value="1">All</option>
                                            <option value="2">Today</option>
                                            <option value="3">Tomorrow</option>
                                            <option value="4">This week</option>
                                        </select>
                                        <div>
                                            <x-primary-button  class="text-sm ml-3" name="confirmChanges" id="confirmChanges">
                                                {{ __('Report Generation') }}
                                            </x-primary-button>
                                        </div>
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
                            <table class="w-full text-sm text-left text-gray-500" id="applicantsTable">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50">
                                    <tr id="head">
                                        {{-- <th scope="col" class="py-3 px-6"><input type="checkbox" name="mainCheckbox" id="mainCheckbox" class="w-4 h-4 text-blue-600 bg-gray-100 rounded border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600" ></th> --}}
                                        <th scope="col" class="py-3 px-6">Name</th>
                                        <th scope="col" class="py-3 px-6">Applicant Status</th>
                                        <th scope="col" class="py-3 px-6">Incoming Year Level</th>  
                                        <th scope="col" class="py-3 px-6">General Average</th>      
                                        <th scope="col" class="py-3 px-6">Family Total Income</th>
                                        <th scope="col" class="py-3 px-6">Interview Date</th>
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
                                        <td class="py-4 px-6 space-x-4">{{ $applicant->interviewdate }}</td>
                                    </tr>
                                @endforeach --}}
                                </tbody>
                            </table>
                            
                                    
                            
                        </div>
                        <div class="mx-3">
                            <br>
                            {{-- $applicants->links() --}}
                                          
                            {{-- <form action="{{ route('admin.pdfapplicants') }}" method="post">
                                @csrf
                                <div class="grid justify-items-end">  
                                    <x-primary-button class="text-sm my-4 " name="confirmChanges" id="confirmChanges">
                                        {{ __('Generate Report') }}
                                    </x-primary-button>
                                </div>
                            </form> --}}
                        </div>
                        
                                        
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