<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class=" bg-white border-b border-gray-200 ">
                    <div class=" mx-6 my-6">
                        <div class="grid grid-cols-2 ">
                            <div class="mx-3 my-3">
                                <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex">
                                        <svg fill="none" class="flex-shrink-0 inline w-5 h-5 mr-3"  stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M17.982 18.725A7.488 7.488 0 0012 15.75a7.488 7.488 0 00-5.982 2.975m11.963 0a9 9 0 10-11.963 0m11.963 0A8.966 8.966 0 0112 21a8.966 8.966 0 01-5.982-2.275M15 9.75a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                                        <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">Total Users</h5>
                                    </div>
                                    <div>
                                        <p class="font-black text-xl text-gray-700 uppercase">{{ __('420') }}</p>
                                    </div>
                                </div>
                                <div class="w-full  p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex">
                                        <svg fill="none" class="flex-shrink-0 inline w-5 h-5 mr-3" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 19.128a9.38 9.38 0 002.625.372 9.337 9.337 0 004.121-.952 4.125 4.125 0 00-7.533-2.493M15 19.128v-.003c0-1.113-.285-2.16-.786-3.07M15 19.128v.106A12.318 12.318 0 018.624 21c-2.331 0-4.512-.645-6.374-1.766l-.001-.109a6.375 6.375 0 0111.964-3.07M12 6.375a3.375 3.375 0 11-6.75 0 3.375 3.375 0 016.75 0zm8.25 2.25a2.625 2.625 0 11-5.25 0 2.625 2.625 0 015.25 0z"></path></svg>
                                        <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">Total Kawans</h5>
                                    </div>
                                    <div>
                                        <p class="font-black text-xl text-gray-700 uppercase">{{ __('9') }}</p>
                                    </div>
                                </div>
                                <div class="w-full p-4 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex">
                                        <svg fill="none" class="flex-shrink-0 inline w-5 h-5 mr-3"  stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15.75 6a3.75 3.75 0 11-7.5 0 3.75 3.75 0 017.5 0zM4.501 20.118a7.5 7.5 0 0114.998 0A17.933 17.933 0 0112 21.75c-2.676 0-5.216-.584-7.499-1.632z"></path></svg>
                                        <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">Total Applicants</h5>
                                    </div>
                                    <div>
                                        <p class="font-black text-xl text-gray-700 uppercase">{{ __('69') }}</p>
                                    </div>
                                </div>
                                <div class="w-full  p-4  bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex">
                                        <svg fill="none" class="flex-shrink-0 inline w-5 h-5 mr-3" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path></svg>
                                        <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">Total Scholars</h5>
                                    </div>
                                    <div>
                                        <p class="font-black text-xl text-gray-700 uppercase">{{ __('200') }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="mr-6">
                                <div class="w-full p-4 my-3 mx-3  bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                                    <div class="flex items-baseline flex-wrap">
                                        <div>
                                            <p class="mb-3 text-lg mr-3 font-semibold text-gray-900 md:text-xl dark:text-white">Academic Year:</p>
                                        </div>
                                        <select id="year" name="year" class="mr-3 text-lg border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm " placeholder="Change To" >
                                            <option value="" disabled hidden selected >Select year</option>
                                            <option value="2023">{{ 'sample' }}</option>
                                            <option value="2022">2022-2021</option>
                                            <option value="2021">2021-2020</option>
                                        </select>
                                        <x-primary-button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-base px-6 py-3.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800">
                                            Save
                                        </x-primary-button>
                                    </div>
                                    
                                </div>
                                <div class="w-full p-4 my-3 mx-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                                    <div class="mb-3 ml-3">
                                        <h5 class="mb-3 text-lg font-semibold text-gray-900 md:text-xl dark:text-white">Applicants Open Submission</h5>
                                        <label class="relative inline-flex items-center mb-5 cursor-pointer">
                                            <input type="checkbox" value="" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Close/Open</span>
                                        </label>
                                    </div>
                                    <div class="ml-3">
                                        <h5 class="mb-3 text-lg font-semibold text-gray-900 md:text-xl dark:text-white">Scholars Open Submission</h5>
                                        <label class="relative inline-flex items-center mb-5 cursor-pointer">
                                            <input type="checkbox" value="" class="sr-only peer">
                                            <div class="w-11 h-6 bg-gray-200 peer-focus:outline-none peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 rounded-full peer dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600"></div>
                                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Close/Open</span>
                                        </label>
                                    </div>
                                    <div class="grid justify-items-center ml-3">
                                        {{-- <button type="button" class=" text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">Confirm Changes</button> --}}
                                        <x-primary-button class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 mr-2 mb-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800">
                                            {{ 'Confirm Changes' }}
                                        </x-primary-button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>                     
                </div>
            </div>
        </div>
    </div>
</x-app-layout>