<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Edit '.$scholar->applicant->full_name.'\'s Requirements' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-message />
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                    <header>
                        <x-nav-link href="{{ route('admin.scholar.show', $scholar->applicant_user_id) }}" class="items-center cursor-pointer mb-5">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" /></svg>
                            <div class="px-3">{{ __('Go Back') }}</div>
                        </x-nav-link>
                    </header>

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
                                    <form action="{{ route('admin.scholar.regi-destroy', ['user_id' => $scholar->applicant_user_id, 'id' => $loop->index]) }}" method="post">
                                        @csrf
                                        <x-primary-button class="mt-2 bg-red-700">Delete</x-primary-button>
                                    </form>
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
                                    <form action="{{ route('admin.scholar.report-destroy', ['user_id' => $scholar->applicant_user_id, 'id' => $loop->index]) }}" method="post">
                                        @csrf
                                        <x-primary-button class="mt-2 bg-red-700">Delete</x-primary-button>
                                    </form>
                                </div> 
                            @endforeach
                        @endif
                    </div>

                    <br><hr class="h-px bg-gray-200 border-0 dark:bg-gray-700"><br>

                    <div class="max-w-xl">
                        <form action="{{ route('admin.scholar.resubmit', $scholar->applicant_user_id) }}" method="post">
                            @csrf
                            <x-input-label for="scholarresubmissionmessage" :value="__('RESUBMISSION MESSAGE (If the scholar needs to resubmit)')" />
                            <x-text-input id="scholarresubmissionmessage" name="scholarresubmissionmessage" type="text" class="mt-1 block w-full" />   
                            <x-input-error class="mt-2" :messages="$errors->get('scholarresubmissionmessage')" />
                            <x-primary-button class="mt-4">
                                {{ __('Resubmit') }}
                            </x-primary-button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
