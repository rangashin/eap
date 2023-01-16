<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <x-success-message />

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="lg:flex md:flex lg:justify-around md:justify-around">
                    @if (in_array($applicant->applicant_statuses_id, [1, 6, 7]))
                        <div class="p-6">
                            <div class="p-6 max-w-sm bg-blue-100 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 content-center ">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">APPLICATION STATUS:</h5>
                                <p class="mb-3 font-normal text-2xl text-gray-700 dark:text-gray-400">  
                                    {{ $applicant->applicantStatus->status }}  
                                </p>
                            </div>
                        </div>
                    @elseif ($applicant->applicant_statuses_id == 2)
                        <div class="p-6">
                            <div class="p-6 max-w-sm bg-yellow-100 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 content-center ">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">APPLICATION STATUS:</h5>
                                <p class="mb-3 font-normal text-2xl text-gray-700 dark:text-gray-400">  
                                    {{ $applicant->applicantStatus->status }}  
                                </p>
                            </div>
                        </div>
                    @elseif ($applicant->applicant_statuses_id == 3)
                        <div class="lg:flex lg:justify-around md:flex md:justify-around ">
                            <div class="p-6">
                                <div class="p-6 max-w-sm bg-green-100 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 content-center ">
                                    <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">APPLICATION STATUS:</h5>
                                    <p class="mb-3 font-normal text-2xl text-gray-700 dark:text-gray-400">  
                                        {{ $applicant->applicantStatus->status }}  
                                    </p>
                                </div>
                            </div>
                            <br>
                            <div class="p-6">
                                <form action="{{ route('applicant.setinterviewdate') }}" method="post">
                                    @csrf
                                    <div class="p-6 max-w-sm bg-blue-100 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700">
                                        <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">INTERVIEW DATE:</h5>      
                                        <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">Select your interview date</p>
                                        <div>                       
                                            <x-text-input id="interviewdate" name="interviewdate" type="text" class="mt-1 block w-full bg-blue-200" placeholder="Set Interview Date"/>
                                            <x-input-error class="mt-2" :messages="$errors->get('interviewdate')" />
                                        </div>
                                        <x-primary-button class="my-3">
                                            {{ __('Submit') }}
                                        </x-primary-button>
                                    </div> 
                                </form>
                            </div>
                        </div>
                        
                    @elseif ($applicant->applicant_statuses_id == 4)
                        <div class="p-6">
                            <div class="p-6 max-w-sm bg-red-100 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 content-center ">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">APPLICATION STATUS:</h5>
                                <p class="mb-3 font-normal text-2xl text-gray-700 dark:text-gray-400">  
                                    {{ $applicant->applicantStatus->status }}  
                                </p>
                            </div>
                        </div>
                    @elseif ($applicant->applicant_statuses_id == 5)
                        <div class="p-6">
                            <div class="p-6 max-w-sm bg-green-100 rounded-lg border border-gray-200 shadow-md dark:bg-gray-800 dark:border-gray-700 content-center ">
                                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">APPLICATION STATUS:</h5>
                                <p class="mb-3 font-normal text-2xl text-gray-700 dark:text-gray-400">  
                                    {{ $applicant->applicantStatus->status }}  
                                </p>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>

    <script>
        var date = new Date({{ Illuminate\Support\Js::from($applicant->hasbeenselecteddate) }});
        date.setDate(date.getDate()+1);
        var startdate = date.toLocaleDateString('en-CA');
        date.setDate(date.getDate()+7);
        var enddate = date.toLocaleDateString('en-CA');

        $('input[name="interviewdate"]').daterangepicker({
            "locale": {
                "format": "YYYY-MM-DD",
            }, 
            "singleDatePicker": true,
            "isInvalidDate": function(date) { return date.day() == 1; }, //no monday
            "startDate": startdate,
            "minDate": startdate,
            "maxDate": enddate,
            "drops": "up"
        });
    </script>
</x-app-layout>
