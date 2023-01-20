<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $scholar->full_name.'\'s Attendance' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-success-message/>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <section>
                    <header>
                        <x-nav-link :href="route('admin.scholar.index')" class="items-center cursor-pointer mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" /></svg>
                            <div class="px-3">{{ __('Go Back') }}</div>
                        </x-nav-link>
                    </header>

                    <div class="flex items-baseline">
                        <svg fill="none" class="flex-shrink-0 inline w-5 h-5 mr-3" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M4.26 10.147a60.436 60.436 0 00-.491 6.347A48.627 48.627 0 0112 20.904a48.627 48.627 0 018.232-4.41 60.46 60.46 0 00-.491-6.347m-15.482 0a50.57 50.57 0 00-2.658-.813A59.905 59.905 0 0112 3.493a59.902 59.902 0 0110.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.697 50.697 0 0112 13.489a50.702 50.702 0 017.74-3.342M6.75 15a.75.75 0 100-1.5.75.75 0 000 1.5zm0 0v-3.675A55.378 55.378 0 0112 8.443m-7.007 11.55A5.981 5.981 0 006.75 15.75v-1.5"></path></svg>
                        <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">Scholar's Attendance</h5>
                    </div>
                    
                    <div class="flex flex-nowrap">
                        <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex">
                                <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">First Webinar</h5>
                            </div>
                            <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                            <div>
                                <p class="font-black text-xl text-gray-700 uppercase">{{ !empty($scholar->scholar->firststudent) ? $scholar->scholar->firststudent : 0 }}</p>
                            </div>
                        </div>
                        <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex">
                                <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">Second Webinar</h5>
                            </div>
                            <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                            <div>
                                <p class="font-black text-xl text-gray-700 uppercase">{{ !empty($scholar->scholar->secondstudent) ? $scholar->scholar->secondstudent : 0 }}</p>
                            </div>
                        </div>
                        <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex">
                                <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">Third Webinar</h5>
                            </div>
                            <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                            <div>
                                <p class="font-black text-xl text-gray-700 uppercase">{{ !empty($scholar->scholar->thirdstudent) ? $scholar->scholar->thirdstudent : 0 }}</p>
                            </div>
                        </div>
                        <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex">
                                <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">Fourth Webinar</h5>
                            </div>
                            <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                            <div>
                                <p class="font-black text-xl text-gray-700 uppercase">{{ !empty($scholar->scholar->fourthstudent) ? $scholar->scholar->fourthstudent : 0 }}</p>
                            </div>
                        </div>
                        <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex">
                                <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">Total</h5>
                            </div>
                            <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                            <div>
                                <p class="font-black text-xl text-gray-700 uppercase">{{ $scholar->scholar->student }}</p>
                            </div>
                        </div>
                    </div>

                    <br><hr class="h-px bg-gray-200 border-0 dark:bg-gray-700"><br>
                        
                    <div class="flex items-baseline">
                        <svg fill="none" class="flex-shrink-0 inline w-5 h-5 mr-3" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                        <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">Parent's Attendance</h5>
                    </div>

                    <div class="flex flex-nowrap">
                        <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex">
                                <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">First Webinar</h5>
                            </div>
                            <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                            <div>
                                <p class="font-black text-xl text-gray-700 uppercase">{{ !empty($scholar->scholar->firstparent) ? $scholar->scholar->firstparent : 0 }}</p>
                            </div>
                        </div>
                        <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex">
                                <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">Second Webinar</h5>
                            </div>
                            <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                            <div>
                                <p class="font-black text-xl text-gray-700 uppercase">{{ !empty($scholar->scholar->secondparent) ? $scholar->scholar->secondparent : 0 }}</p>
                            </div>
                        </div>
                        <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex">
                                <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">Third Webinar</h5>
                            </div>
                            <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                            <div>
                                <p class="font-black text-xl text-gray-700 uppercase">{{ !empty($scholar->scholar->thirdparent) ? $scholar->scholar->thirdparent : 0 }}</p>
                            </div>
                        </div>
                        <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex">
                                <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">Fourth Webinar</h5>
                            </div>
                            <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                            <div>
                                <p class="font-black text-xl text-gray-700 uppercase">{{ !empty($scholar->scholar->fourthparent) ? $scholar->scholar->fourthparent : 0 }}</p>
                            </div>
                        </div>
                        <div class="w-full p-4 mr-3 mb-3 bg-white border rounded-lg shadow-md sm:p-6 dark:bg-gray-800 dark:border-gray-700">
                            <div class="flex">
                                <h5 class="text-base font-semibold pb-2 text-gray-900 md:text-xl dark:text-white">Total</h5>
                            </div>
                            <hr class="mb-3 h-px bg-gray-200 border-0 drop-shadow dark:bg-gray-700">
                            <div>
                                <p class="font-black text-xl text-gray-700 uppercase">{{ $scholar->scholar->parent }}</p>
                            </div>
                        </div>
                    </div>
                </section>      
                <div class="flex items-center justify-end mt-4 mr-3">
                    <a href="{{ route('admin.scholar.attendance-edit', $scholar->user_id) }}">
                        <x-primary-button type="button">
                            {{ __('Edit Attendance') }} 
                        </x-primary-button>
                    </a> 
                </div>
            </div>

            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="flex items-baseline">
                    <svg fill="none" class="flex-shrink-0 inline w-5 h-5 mr-3" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M15 9h3.75M15 12h3.75M15 15h3.75M4.5 19.5h15a2.25 2.25 0 002.25-2.25V6.75A2.25 2.25 0 0019.5 4.5h-15a2.25 2.25 0 00-2.25 2.25v10.5A2.25 2.25 0 004.5 19.5zm6-10.125a1.875 1.875 0 11-3.75 0 1.875 1.875 0 013.75 0zm1.294 6.336a6.721 6.721 0 01-3.17.789 6.721 6.721 0 01-3.168-.789 3.376 3.376 0 016.338 0z"></path>
                    </svg>
                    <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">School Registration Card or Registration Form</h5>
                </div>
                <div class="max-w-2xl">
                    @if (count($regis) == 0)
                        <div class="py-6 bg-white  hover:bg-gray-50">
                            <p class="font-black text-xl text-gray-700">{{ 'No files.' }}</p>
                        </div>
                    @else
                        @foreach ($regis as $regi)
                            <div class="flex mb-4">
                                <x-text-input class="mt-1 block w-full mr-3 flex-1 bg-slate-200" type="text" value="{{ $regi->name }}" disabled />
                                <a href="{{ $regi->getUrl() }}" target="_blank">
                                    <x-primary-button class="mt-2 bg-blue-700">View Registration Card/Form</x-primary-button>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>

                <br><hr class="h-px bg-gray-200 border-0 dark:bg-gray-700"><br>

                <div class="flex items-baseline">
                    <svg fill="none" class="flex-shrink-0 inline w-5 h-5 mr-3" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M7.5 14.25v2.25m3-4.5v4.5m3-6.75v6.75m3-9v9M6 20.25h12A2.25 2.25 0 0020.25 18V6A2.25 2.25 0 0018 3.75H6A2.25 2.25 0 003.75 6v12A2.25 2.25 0 006 20.25z"></path>
                    </svg>
                    <h5 class="mb-3 text-base font-semibold text-gray-900 md:text-xl dark:text-white">School Report Card</h5>
                </div>
                <div class="max-w-2xl">
                    @if (count($reports) == 0)
                        <div class="py-6 bg-white  hover:bg-gray-50">
                            <p class="font-black text-xl text-gray-700">{{ 'No files.' }}</p>
                        </div>
                    @else
                        @foreach ($reports as $report)
                            <div class="flex mb-4">
                                <x-text-input class="mt-1 block w-full mr-3 flex-1 bg-slate-200" type="text" value="{{ $report->name }}" disabled />
                                <a href="{{ $report->getUrl() }}" target="_blank">
                                    <x-primary-button class="mt-2 bg-blue-700">View Report Card</x-primary-button>
                                </a>
                            </div>
                        @endforeach
                    @endif
                </div>
                
                <div class="flex items-center justify-end mt-4">
                    <a href="{{ route('admin.scholar.requirements-edit', $scholar->user_id) }}">
                        <x-primary-button class="ml-3" type="button">
                            {{ __('Manage Files') }}
                        </x-primary-button>
                    </a>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>