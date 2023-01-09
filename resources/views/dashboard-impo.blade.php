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
                
            </div>
        </div>
    </div>
</x-app-layout>
