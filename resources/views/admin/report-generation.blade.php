<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Report Generation') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-error-message/>
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <form action="{{ route('admin.report.generate') }}" method="post">
                        @csrf
                        {{--Dropdown for Main Category --}}
                        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-6 mt-2 mb-6">
                            <div class="" id="adminmaincategory">
                                <x-input-label for="category" :value="__('Select category:')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="category" id="category">
                                    <option {{ old('category') == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('category') == 'applicant' ? 'selected' : '' }} value="applicant">Applicant</option>
                                    <option {{ old('category') == 'scholar' ? 'selected' : '' }} value="scholar">Scholar</option>
                                </select>
                                {{-- <x-input-error :messages="$errors->get('renewal')" class="mt-2" /> --}}
                            </div>
                        </div>
                        {{-- End of Block for Main Category --}}

                        <hr class="hidden " id="applicant_hr">

                        {{-- Dropdown for Applicants --}}
                        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6 hidden " id="applicant_div">
                            <div class="hidden " id="applicantstatus-report_div">
                                <x-input-label for="applicantstatus-report" :value="__('Select Applicant Status:')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="applicantstatusreport" id="applicantstatus-report">
                                    <option {{ old('applicantstatus-report') == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('applicantstatus-report') == 'all' ? 'selected' : '' }} value="all">All</option>
                                    <option {{ old('applicantstatus-report') == 'underreview' ? 'selected' : '' }} value="underreview">Under Review</option>
                                    <option {{ old('applicantstatus-report') == 'selectedwaiting' ? 'selected' : '' }} value="selectedwaiting">Selected and Waiting</option>
                                    <option {{ old('applicantstatus-report') == 'rejected' ? 'selected' : '' }} value="rejected">Rejected</option>
                                </select>
                                {{-- <x-input-error :messages="$errors->get('renewal')" class="mt-2" /> --}}
                            </div>

                            <div class="hidden " id="underreviewdatespan_div">
                                <x-input-label for="underreviewdatespan" :value="__('Select Date Span:')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="underreviewdatespan" id="underreviewdatespan">
                                    <option {{ old('underreviewdatespan') == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('underreviewdatespan') == 'lastweek' ? 'selected' : '' }} value="lastweek">Last 7 days</option>
                                    <option {{ old('underreviewdatespan') == 'lastmonth' ? 'selected' : '' }} value="lastmonth">Last Month</option>
                                </select>
                                {{-- <x-input-error :messages="$errors->get('renewal')" class="mt-2" /> --}}
                            </div>
                        </div>
                        {{-- End of Block for Applicants --}}

                        <hr class="hidden " id="scholar_hr">

                        {{-- Dropdown For Scholar --}}
                        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6 hidden " id="scholar_div">
                            <div class="hidden " id="scholarstatus-report_div">
                                <x-input-label for="scholarstatus-report" :value="__('Select Scholar Status:')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="scholarstatusreport" id="scholarstatus-report">
                                    <option {{ old('scholarstatus-report') == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('scholarstatus-report') == 'all' ? 'selected' : '' }} value="all">All</option>
                                    <option {{ old('scholarstatus-report') == 'regular' ? 'selected' : '' }} value="regular">Regular</option>
                                    <option {{ old('scholarstatus-report') == 'conditional' ? 'selected' : '' }} value="conditional">Conditional</option>
                                    <option {{ old('scholarstatus-report') == 'incomplete' ? 'selected' : '' }} value="incomplete">Incomplete</option>
                                </select>
                                {{-- <x-input-error :messages="$errors->get('renewal')" class="mt-2" /> --}}
                            </div>
                        </div>
                        {{-- End of Block for Scholar --}}

                        <div class="flex items-center justify-end">
                            <x-primary-button class="text-lg " id="createReport">
                                {{ __('Create Report') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function(){
            $("select#category").change(function(){
                var selected = $(this).children("option:selected").val();
                if (selected == 'applicant'){
                    $("#applicant_hr").removeClass("hidden");
                    $("#applicant_div").removeClass("hidden");
                    $("#applicantstatus-report_div").removeClass("hidden");
                    $("#scholar_hr").addClass("hidden");
                    $("#scholar_div").addClass("hidden");
                    $("#scholarstatus-report_div").addClass("hidden");
                    $("select#scholarstatus-report").val('');

                }else if (selected == 'scholar'){
                    $("#applicant_hr").addClass("hidden");
                    $("#applicant_div").addClass("hidden");
                    $("#applicantstatus-report_div").addClass("hidden");
                    $("#scholar_hr").removeClass("hidden");
                    $("#scholar_div").removeClass("hidden");
                    $("#scholarstatus-report_div").removeClass("hidden");
                    $("select#underreviewdatespan").val('');
                    $("select#applicantstatus-report").val('');
                    
                }
            });

            var selectedCategory = $("select#category option:selected").val(); 
            if (selectedCategory == 'applicant'){
                $("#applicant_hr").removeClass("hidden");
                $("#applicant_div").removeClass("hidden");
                $("#applicantstatus-report_div").removeClass("hidden");
                $("#scholar_hr").addClass("hidden");
                $("#scholar_div").addClass("hidden");
                $("#scholarstatus-report_div").addClass("hidden");
                $("select#scholarstatus-report").val('');
            }else if (selectedCategory == 'scholar'){
                $("#applicant_hr").addClass("hidden");
                $("#applicant_div").addClass("hidden");
                $("#applicantstatus-report_div").addClass("hidden");
                $("#scholar_hr").removeClass("hidden");
                $("#scholar_div").removeClass("hidden");
                $("#scholarstatus-report_div").removeClass("hidden");
                $("select#underreviewdatespan").val('');
                $("select#applicantstatus-report").val('');  
            }else if (selectedCategory == ''){
                $("#applicant_hr").addClass("hidden");
                $("#applicant_div").addClass("hidden");
                $("#scholar_hr").addClass("hidden");
                $("#scholar_div").addClass("hidden");
                $("#scholarstatus-report_div").addClass("hidden");
                $("select#scholarstatus-report").val('');
                $("select#underreviewdatespan").val('');
                $("select#applicantstatus-report").val('');  
            }

            $("select#applicantstatus-report").change(function(){
                var selected = $(this).children("option:selected").val();
                if (selected == 'underreview'){
                    $("#underreviewdatespan_div").removeClass("hidden");
                }else{
                    $("#underreviewdatespan_div").addClass("hidden");
                    $("select#underreviewdatespan").val('');
                }
            });

            var selectedStatus = $("select#applicantstatus-report option:selected").val(); 
            if (selectedStatus == 'underreview'){
                $("#underreviewdatespan_div").removeClass("hidden");
            }else{
                $("#underreviewdatespan_div").addClass("hidden");
                $("select#underreviewdatespan").val('');
            }
        });
    </script>
</x-app-layout>
