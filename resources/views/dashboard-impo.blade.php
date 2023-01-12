<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="flex justify-around">
                    <div class="p-6">
                        <div class="p-6 max-w-sm bg-green-100  rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 content-center ">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">APPLICATION STATUS:</h5>
                            <p class="mb-3 font-normal text-2xl text-gray-700 dark:text-gray-400">DASHBOARD IMPOSTOR</p>
                        </div>
                    </div>
                    
                    {{-- <div class="p-6">
                        <div class="p-6 max-w-sm bg-blue-100 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">INTERVIEW DATE:</h5>      
                            <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Select your interview date</p>
                            <div>                       
                                <x-text-input  id="interviewdate" name="interviewdate" type="text" class="mt-1 block w-full bg-blue-200" placeholder="Set Interview Date"/>
                                <x-input-error class="mt-2" :messages="$errors->get('interviewdate')" />
                            </div>
                            <x-primary-button class="my-3">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </div> --}}


                    {{-- <div class="p-6 text-gray-900">
                        {{ auth()->user()->id }}
                    </div> --}}
                    
                </div>
                <div class="flex items-baseline">
                    <svg fill="none" class="flex-shrink-0 inline w-5 h-5 mr-3" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path>
                    </svg>
                    <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">
                        Scholar's Attendance
                    </h5>
                </div>
                
                <div class="flex flex-nowrap">
                    <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex">
                            
                            <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">
                                First Webinar
                            </h5>
                        </div>
                        <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                        <div>
                            <p class="font-black text-xl text-gray-700 uppercase">{{ __('420') }}</p>
                        </div>
                    </div>
                    <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex">
                            
                            <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">
                                Second Webinar
                            </h5>
                        </div>
                        <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                        <div>
                            <p class="font-black text-xl text-gray-700 uppercase">{{ __('420') }}</p>
                        </div>
                    </div>
                    <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex">
                            
                            <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">
                                Third Webinar
                            </h5>
                        </div>
                        <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                        <div>
                            <p class="font-black text-xl text-gray-700 uppercase">{{ __('420') }}</p>
                        </div>
                    </div>
                    <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex">
                            
                            <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">
                                Fourth Webinar
                            </h5>
                        </div>
                        <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                        <div>
                            <p class="font-black text-xl text-gray-700 uppercase">{{ __('420') }}</p>
                        </div>
                    </div>
                    <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex">
                            
                            <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">
                                Total
                            </h5>
                        </div>
                        <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                        <div>
                            <p class="font-black text-xl text-gray-700 uppercase">{{ __('420') }}</p>
                        </div>
                    </div>
                </div>
                
                <br>
                <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                <br>
                
                <div class="flex items-baseline">
                    <svg fill="none" class="flex-shrink-0 inline w-5 h-5 mr-3" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                    </svg>
                    <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">
                        Parent's Attendance
                    </h5>
                </div>

                <div class="flex flex-nowrap">
                    <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex">
                            
                            <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">
                                First Webinar
                            </h5>
                        </div>
                        <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                        <div>
                            <p class="font-black text-xl text-gray-700 uppercase">{{ __('420') }}</p>
                        </div>
                    </div>
                    <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex">
                            
                            <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">
                                Second Webinar
                            </h5>
                        </div>
                        <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                        <div>
                            <p class="font-black text-xl text-gray-700 uppercase">{{ __('420') }}</p>
                        </div>
                    </div>
                    <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex">
                            
                            <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">
                                Third Webinar
                            </h5>
                        </div>
                        <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                        <div>
                            <p class="font-black text-xl text-gray-700 uppercase">{{ __('420') }}</p>
                        </div>
                    </div>
                    <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex">
                            
                            <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">
                                Fourth Webinar
                            </h5>
                        </div>
                        <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                        <div>
                            <p class="font-black text-xl text-gray-700 uppercase">{{ __('420') }}</p>
                        </div>
                    </div>
                    <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                        <div class="flex">
                            
                            <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">
                                Total
                            </h5>
                        </div>
                        <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                        <div>
                            <p class="font-black text-xl text-gray-700 uppercase">{{ __('420') }}</p>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</x-app-layout>
