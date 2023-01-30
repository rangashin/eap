<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submit Requirements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-message/>
            <x-error-message/>
            @if (!empty($scholar->scholarresubmissionmessage))
                <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 lg:rounded-lg md:rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                    <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Info</span>
                    <div>
                        <span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
                        <p class="text-xl font-black pt-3">NOTE:</p>
                        <ul class="list-disc pl-5">
                            <li class="font-bold text-lg">{{ $scholar->scholarresubmissionmessage }}</li>
                        </ul>
                    </div>
                </div>
            @endif
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    <form action="{{ route('submit-requirements.store') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="overflow-x-auto relative shadow-md sm:rounded-lg">
                            <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                                <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                    <tr>
                                        <th scope="col" class="py-3 px-6">
                                            Required Documents
                                        </th>
                                        <th scope="col" class="py-3 px-6">
                                            Attached File
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (in_array($scholar->applicant->yearlevel, ['SHS', 'C']))
                                        <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                            <th scope="row" class="flex items-center py-6 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <x-input-label class=" uppercase " for="file_input_report" id="file_input_report_label" value="Latest Registration Form"/>
                                                <svg fill="none" data-tooltip-target="tooltip-regi" data-tooltip-placement="top" class="flex-shrink-0 inline mt-2 w-5 h-5 ml-3 fill-gray-300 stroke-gray-600 mb-2 " stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path></svg>
                                                <div id="tooltip-regi" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    <b>Example Format: </b><i> Dela Cruz, Juan-Registration Form(1st Semester)</i>
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </th>
                                            <td class="py-4 px-6">
                                                @if (count($scholar->getMedia('scholar_regi')) >= 1)
                                                    <input aria-describedby="file_input_help" id="file_input" type="file" name="file_input_scholar_regi" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-slate-200 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" disabled />
                                                @else
                                                    <input aria-describedby="file_input_help" id="file_input" type="file" name="file_input_scholar_regi" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                                                @endif
                                                <x-input-error :messages="$errors->get('file_input_scholar_regi')" class="mt-2" />
                                            </td>
                                        </tr>
                                        <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="flex items-center py-6 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <x-input-label class=" uppercase " for="file_input_report" id="file_input_report_label" value="Latest Report Card"/>
                                                <svg fill="none" data-tooltip-target="tooltip-report" data-tooltip-placement="top" class="flex-shrink-0 inline mt-2 w-5 h-5 ml-3 fill-gray-300 stroke-gray-600 mb-2 " stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path></svg>
                                                <div id="tooltip-report" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    <b>Example Format: </b>
                                                        <ul>
                                                            <li class="pl-5"><b>For Elementary to High School: </b> <i>Dela Cruz, Juan-Report Card(1st Quarter)</i></li>
                                                            <li class="pl-5"><b>For Senior High School to College: </b> <i>Dela Cruz, Juan-Report Card(1st Semester)</i></li>
                                                        </ul>
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </th>
                                            <td class="py-4 px-6">
                                                @if (count($scholar->getMedia('scholar_report')) >= 1)
                                                    <input aria-describedby="file_input_help" id="file_input" type="file" name="file_input_scholar_report" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-slate-200 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" disabled />
                                                @else
                                                    <input aria-describedby="file_input_help" id="file_input" type="file" name="file_input_scholar_report" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                                                @endif
                                                <x-input-error :messages="$errors->get('file_input_scholar_report')" class="mt-2" />
                                            </td>        
                                        </tr>
                                    @elseif (in_array($scholar->applicant->yearlevel, ['E', 'HS']))
                                        <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700">
                                            <th scope="row" class="flex items-center py-6 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                                <x-input-label class=" uppercase " for="file_input_report" id="file_input_report_label" value="Latest Report Card"/>
                                                <svg fill="none" data-tooltip-target="tooltip-report" data-tooltip-placement="top" class="flex-shrink-0 inline mt-2 w-5 h-5 ml-3 fill-gray-300 stroke-gray-600 mb-2 " stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path></svg>
                                                <div id="tooltip-report" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                                    <b>Example Format: </b>
                                                        <ul>
                                                            <li class="pl-5"><b>For Elementary to High School: </b> <i>Dela Cruz, Juan-Report Card(1st Quarter)</i></li>
                                                            <li class="pl-5"><b>For Senior High School to College: </b> <i>Dela Cruz, Juan-Report Card(1st Semester)</i></li>
                                                        </ul>
                                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                                </div>
                                            </th>
                                            <td class="py-4 px-6">
                                                @if (count($scholar->getMedia('scholar_report')) >= 3)
                                                    <input aria-describedby="file_input_help" id="file_input" type="file" name="file_input_scholar_report" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg bg-slate-200 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" disabled />
                                                @else
                                                    <input aria-describedby="file_input_help" id="file_input" type="file" name="file_input_scholar_report" class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" />
                                                @endif
                                                <x-input-error :messages="$errors->get('file_input_scholar_report')" class="mt-2" />
                                            </td>        
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="flex items-baseline p-4 my-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium"><p class="text-xl font-black">NOTE:</p></span>
                                <ul class="list-disc pl-5">
                                    <li class="font-bold text-base">Only UPLOAD DOCUMENTS in JPG or PNG Format! (Max. 8MB)</li>
                                    <li class="font-semibold text-base">Please make sure that you have rename your file before submitting to reduce the chance that your submission will be rejected.</li>
                                    <li class="font-semibold text-base">Please rename the file with your name, and according to the requirements.</li>
                                </ul>
                            </div>
                        </div>
                        @if (in_array($scholar->applicant->yearlevel, ['SHS', 'C']))
                            @unless (count($scholar->getMedia('scholar_regi')) == 1 && count($scholar->getMedia('scholar_report')) == 1)
                                <div class="flex items-center justify-end mt-4">
                                    <x-primary-button class="ml-3">
                                        {{ ('Submit Requirements') }}
                                    </x-primary-button>
                                </div>
                            @endunless
                        @elseif (in_array($scholar->applicant->yearlevel, ['E', 'HS']))
                            @unless (count($scholar->getMedia('scholar_report')) == 3)
                                <div class="flex items-center justify-end mt-4">
                                    <x-primary-button class="ml-3">
                                        {{ ('Submit Requirements') }}
                                    </x-primary-button>
                                </div>
                            @endunless
                        @endif
                    </form>         
                </div>
            </div>
        </div>
    </div>
</x-app-layout>