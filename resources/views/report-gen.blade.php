<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Gen') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            {{-- <x-success-message /> --}}

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">

                    {{--Dropdown for Main Category --}}
                    <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6">
                        <div class="" id="adminmaincategory">
                            <x-input-label for="adminreportgen" :value="__('Select category:')" class="uppercase"/>
                            <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="adminreportgen" id="adminreportgen">
                                <option value="" disabled selected hidden></option>
                                <option value="applicant">Applicant</option>
                                <option value="scholar">Scholar</option>
                            </select>
                            {{-- <x-input-error :messages="$errors->get('renewal')" class="mt-2" /> --}}
                        </div>
                    </div>
                    {{-- End of Block for Main Category --}}

                    <hr>

                    {{-- Dropdown for Applicants --}}
                    <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6">
                        <div class="" id="applicantstatusdropdown">
                            <x-input-label for="applicantcategory" :value="__('Select Applicant Status:')" class="uppercase"/>
                            <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="applicantcategory" id="applicantcategory">
                                <option value="" disabled selected hidden></option>
                                <option value="all">All</option>
                                <option value="underreview">Under Review</option>
                                <option value="selectedwaiting">Selected and Waiting</option>
                                <option value="rejected">Rejected</option>
                            </select>
                            {{-- <x-input-error :messages="$errors->get('renewal')" class="mt-2" /> --}}
                        </div>

                        <div class="" id="underreviewdropdown">
                            <x-input-label for="underreviewdaterange" :value="__('Select Date Span:')" class="uppercase"/>
                            <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="underreviewdaterange" id="underreviewdaterange">
                                <option value="" disabled selected hidden></option>
                                <option value="lastweek">Last 7 days</option>
                                <option value="lastmonth">Last Month</option>
                            </select>
                            {{-- <x-input-error :messages="$errors->get('renewal')" class="mt-2" /> --}}
                        </div>

                        
                    </div>
                    {{-- End of Block for Applicants --}}

                    <hr>

                    {{-- Dropdown For Scholar --}}
                    <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6">
                        <div>
                            <x-input-label for="scholarcategory" :value="__('Select Scholar Status:')" class="uppercase"/>
                            <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="scholarcategory" id="scholarcategory">
                                <option value="" disabled selected hidden></option>
                                <option value="all">All</option>
                                <option value="regular">Regular</option>
                                <option value="conditional">Conditional</option>
                                <option value="incomplete">Incomplete</option>
                            </select>
                            {{-- <x-input-error :messages="$errors->get('renewal')" class="mt-2" /> --}}
                        </div>
                        
                    </div>
                    {{-- End of Block for Scholar --}}

                    <hr>

                    {{-- Dropdown for Applicant Interview --}}
                    <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6">
                        <div>
                            <x-input-label for="applicantinterviewstatus" :value="__('Select Applicant Interview Status:')" class="uppercase"/>
                            <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="applicantinterviewstatus" id="applicantinterviewstatus">
                                <option value="" disabled selected hidden></option>
                                <option value="selectedandwaiting">Selected and Waiting</option>
                            </select>
                            {{-- <x-input-error :messages="$errors->get('renewal')" class="mt-2" /> --}}
                        </div>
                        <div>
                            <x-input-label for="interviewselectspan" :value="__('Select Date Span:')" class="uppercase"/>
                            <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="interviewselectspan" id="interviewselectspan">
                                <option value="" disabled selected hidden></option>
                                <option value="all">All</option>
                                <option value="today">Today</option>
                                <option value="tomorrow">Tomorrow</option>
                                <option value="thisweek">This Week</option>
                            </select>
                            {{-- <x-input-error :messages="$errors->get('renewal')" class="mt-2" /> --}}
                        </div>
                       
                        
                    </div>
                    {{-- End of Block for Applicant Interview --}}
                    <div class="flex items-center justify-end mt-4">
                        <x-primary-button type="button" class="text-lg " name="createReport" id="createReport">
                            {{ __('Create Report') }}
                        </x-primary-button>
                    </div>
                </div>
                
                
            </div>
        </div>
    </div>
</x-app-layout>
