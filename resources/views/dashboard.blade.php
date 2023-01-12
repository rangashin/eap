<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6">
                    {{-- <div class="block max-w-sm p-6 bg-white rounded-lg dark:bg-gray-800">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
                    <br> --}}
                    <div class="block max-w-sm p-6 bg-white rounded-lg dark:bg-gray-800">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                        <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                    </div>
                    <br>
                    <div class="p-6 bg-green-100  rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 content-center ">
                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">SCHOLAR STATUS:</h5>
                        <p class="mb-3 font-normal text-2xl text-gray-700 dark:text-gray-400">{{ 'TEST' }}</p>    
                    </div>
                    {{-- <div class="mt-4 overflow-x-auto relative shadow-md sm:rounded-lg">
                        <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                            <caption class="p-5 text-lg font-semibold text-left text-gray-900 bg-white dark:text-white dark:bg-gray-800">Scholar Attendance</caption>
                            <thead>
                                <tr class="text-xs text-center text-gray-700 uppercase dark:text-gray-400">
                                    <th scope="col" class="py-3 px-6 text-xl uppercase">1st Webinar</th>
                                    <th scope="col" class="py-3 px-6 text-xl uppercase">2nd Webinar</th>
                                    <th scope="col" class="py-3 px-6 text-xl uppercase">3rd Webinar</th>
                                    <th scope="col" class="py-3 px-6 text-xl uppercase">4th Webinar</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="border-b text-center border-gray-200 dark:border-gray-700">
                                    <td class="py-4 px-6">{{ !empty($scholar->firstStudent) ?  $scholar->firstStudent : 0}}</td>
                                    <td class="py-4 px-6">{{ !empty($scholar->secondStudent) ? $scholar->secondStudent : 0}}</td>
                                    <td class="py-4 px-6">{{ !empty($scholar->thirdStudent) ? $scholar->thirdStudent : 0}}</td>
                                    <td class="py-4 px-6">{{ !empty($scholar->fourthStudent) ? $scholar->fourthStudent : 0}}</td>
                                </tr>
                            </tbody>
                        </table>
                        
                    </div> --}}
                </div>
                {{-- <div class="flex justify-around">
                    <div class="p-6">
                        <div class="p-6 max-w-sm bg-blue-100  rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 content-center ">
                            <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">APPLICATION STATUS:</h5>
                            <p class="mb-3 font-normal text-2xl text-gray-700 dark:text-gray-400">Not yet registered</p>
                        </div>
                        {{ 'KANTUTAN NA' }}
                    </div>
                </div> --}}
                {{-- <div class="p-6 text-gray-900">
                    You're logged in!
                </div>
                <div class="p-6 bg-white border-b border-gray-200">
                    KANTUTAN NA
                </div> --}}
                
                {{-- <div class="block max-w-sm p-6 bg-white border border-gray-200 rounded-lg shadow-md dark:bg-gray-800 dark:border-gray-700">
                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">Noteworthy technology acquisitions 2021</h5>
                    <p class="font-normal text-gray-700 dark:text-gray-400">Here are the biggest enterprise technology acquisitions of 2021 so far, in reverse chronological order.</p>
                </div> --}}
            </div>
        </div>
    </div>
</x-app-layout>
