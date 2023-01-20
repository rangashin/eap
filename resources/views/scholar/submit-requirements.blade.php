<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Submit Requirements') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-message/>
            {{-- <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
                    <p class="text-xl font-black pt-3">NOTE:</p>
                    <ul class="list-disc pl-5">
                        <li class="font-bold text-lg">Please double check the inputs before resubmmiting.</li>
                        <li class="font-bold text-lg">{{ 'xd' }}</li>
                    </ul>
                </div>
            </div> --}}
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
                                    <tr class="bg-white border-b dark:bg-gray-900 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white uppercase">Latest Registration Form/Card</th>
                                        <td class="py-4 px-6">
                                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="file_input_scholar_regi"/>
                                            <x-input-error :messages="$errors->get('file_input_scholar_regi')" class="mt-2" />
                                        </td>
                                    </tr>
                                    <tr class="bg-gray-50 border-b dark:bg-gray-800 dark:border-gray-700">
                                        <th scope="row" class="py-4 px-6 font-medium text-gray-900 whitespace-nowrap dark:text-white uppercase">Latest Report Card</th>
                                        <td class="py-4 px-6">
                                            <input class="block w-full text-sm text-gray-900 border border-gray-300 rounded-lg cursor-pointer bg-gray-50 dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400" aria-describedby="file_input_help" id="file_input" type="file" name="file_input_scholar_report"/>
                                            <x-input-error :messages="$errors->get('file_input_scholar_report')" class="mt-2" />
                                        </td>        
                                    </tr>
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
                                    <li class="font-semibold text-base">Please rename the file with your name, and according to the latest grading quarter or semester.</li>
                                    <li class="font-semibold text-base">Format: <strong>LastName, FirstName-Grading Quarter(Report Card/Registration Form)</strong></li>
                                    <li class="font-semibold text-base">Example: <i><strong>Cruz, Juan-1st Quarter(Report Card)</strong></i> | If college: <i><strong>Dela Cruz, Juan-1st Semester(Report Card)</strong></i></li>
                                </ul>
                            </div>
                        </div>
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button class="ml-3">
                                {{ __('Submit Requirements') }}
                            </x-primary-button>
                        </div>          
                    </form>         
                </div>
            </div>
        </div>
    </div>
</x-app-layout>