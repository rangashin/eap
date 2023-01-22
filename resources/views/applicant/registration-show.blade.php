<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registration\'s Info') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <header>
                        <x-nav-link :href="route('dashboard')" class="items-center">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                                stroke="currentColor" class="w-6 h-6">
                                <path stroke-linecap="round" stroke-linejoin="round"
                                    d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" />
                            </svg>
                            <div class="px-3">{{ __('Go Back') }}</div>
                        </x-nav-link>
                    </header>
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Applicant's Information
                    </h6>
                    {{-- <div class="grid grid-cols-4 gap-6 my-6"> --}}
                    <div
                        class="grid lg:grid-cols-5 lg:grid-row-3 md:grid-cols-3 md:grid-row-4 sm:grid-cols-2 sm:grid-row-6 xs:grid-cols-2 grid-flow-row gap-6 my-6">
                        <div class="lg:row-span-3 xs:col-span-2 sm:col-span-1">
                            <x-input-label for="applicantpicture" :value="__('2x2 Picture')" class="uppercase" />
                            <img class="w-52 h-52" src="{{ $applicant->getFirstMediaUrl('picture') }}"
                                alt="2x2 picture">
                        </div>
                        <div>
                            <x-input-label for="kawan_id" :value="__('Full Name')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">{{ $applicant->full_name }}</p>
                        </div>
                        <div>
                            <x-input-label for="kawan_id" :value="__('Kawan')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">{{ $applicant->kawan->kawanname }}</p>
                        </div>
                        <div>
                            <x-input-label for="renewal" :value="__('Status')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">{{ $applicant->renewal . ' APPLICANT' }}
                            </p>
                        </div>
                        <div>
                            <x-input-label for="scholaryears" :value="__('No. of Years As EAP Scholar')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">{{ $applicant->scholaryears }}</p>
                        </div>
                        <div>
                            <x-input-label for="genave" :value="__('General Average')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700">{{ $applicant->genave }}</p>
                        </div>
                        <div>
                            <x-input-label for="applicantbirthdate" :value="__('Age')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ $age = date_diff(date_create(date('Y-m-d')), date_create($applicant->applicantbirthdate))->y }}
                            </p>
                        </div>
                        <div>
                            <x-input-label for="applicantsex" :value="__('Sex')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">{{ $applicant->applicantsex }}</p>
                        </div>
                        <div>
                            <x-input-label for="applicantcontactno" :value="__('Contact Number')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700">{{ $applicant->applicantcontactno }}</p>
                        </div>
                        <div class="lg:col-span-4">
                            <x-input-label for="applicantaddress" :value="__('Address')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">{{ $applicant->applicantaddress }}
                            </p>
                        </div>
                    </div>


                    <div class="grid min-[320px]:grid-cols-2 lg:grid-cols-3 md:grid-cols-2   gap-6 my-6 ">
                        <div>
                            <x-input-label for="gradeyearorlevel" :value="__('Incoming Grade Or Year Level')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">{{ $applicant->gradeyearorlevel }}
                            </p>
                        </div>
                        @switch($applicant->gradeyearorlevel)
                            @case('1ST YEAR COLLEGE')
                            @case('2ND YEAR COLLEGE')

                            @case('3RD YEAR COLLEGE')
                            @case('4TH YEAR COLLEGE')

                            @case('5TH YEAR COLLEGE')
                                <div>
                                    <x-input-label for="course" :value="__('Course')" class="uppercase" />
                                    <p class="font-black text-xl text-gray-700 uppercase">{{ $applicant->course }}</p>
                                </div>
                            @break

                            @default
                        @endswitch
                        <div>
                            <x-input-label for="schoolname" :value="__('Name of School')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">{{ $applicant->schoolname }}</p>
                        </div>
                        <div>
                            <x-input-label for="schooladdress" :value="__('School Address')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">{{ $applicant->schooladdress }}</p>
                        </div>
                    </div>

                    <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Parent's Information
                    </h6>
                    <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 min-[320px]:grid-cols-2 gap-6 mt-6">
                        <div>
                            <x-input-label for="fathername" :value="__('Father\'s Name')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ !empty($applicant->fathername) ? $applicant->fathername : 'N/A' }}</p>
                        </div>
                        <div>
                            <x-input-label for="fatherage" :value="__('Father\'s Age')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700">
                                {{ !empty($applicant->fatherage) ? $applicant->fatherage : 'N/A' }}</p>
                        </div>
                        <div>
                            <x-input-label for="fatheroccupation" :value="__('Father\'s Occupation')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ !empty($applicant->fatheroccupation) ? $applicant->fatheroccupation : 'N/A' }}</p>
                        </div>
                        <div>
                            <x-input-label for="fatherincome" :value="__('Father\'s Monthly Income')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700">
                                {{ !empty($applicant->fatherincome) ? '₱' . number_format($applicant->fatherincome, 2) : 'N/A' }}
                            </p>
                        </div>
                        <div>
                            <x-input-label for="fatheroccupation" :value="__('Father\'s Occupation')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ !empty($applicant->fatheroccupation) ? $applicant->fatheroccupation : 'N/A' }}</p>
                        </div>
                        <div>
                            <x-input-label for="fatherreligion" :value="__('Father\'s Religion')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ !empty($applicant->fatherreligion) ? $applicant->fatherreligion : 'N/A' }}</p>
                        </div>
                    </div>
                    <hr class="my-6">
                    <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 min-[320px]:grid-cols-2 gap-6 mt-6">
                        <div>
                            <x-input-label for="mothername" :value="__('Mother\'s Name')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ !empty($applicant->mothername) ? $applicant->mothername : 'N/A' }}</p>
                        </div>
                        <div>
                            <x-input-label for="motherage" :value="__('Mother\'s Age')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700">
                                {{ !empty($applicant->motherage) ? $applicant->motherage : 'N/A' }}</p>
                        </div>
                        <div>
                            <x-input-label for="motheroccupation" :value="__('Mother\'s Occupation')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ !empty($applicant->motheroccupation) ? $applicant->motheroccupation : 'N/A' }}</p>
                        </div>
                        <div>
                            <x-input-label for="motherincome" :value="__('Mother\'s Monthly Income')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700">
                                {{ !empty($applicant->motherincome) ? '₱' . number_format($applicant->motherincome, 2) : 'N/A' }}
                            </p>
                        </div>
                        <div>
                            <x-input-label for="motheroccupation" :value="__('Mother\'s Occupation')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ !empty($applicant->motheroccupation) ? $applicant->motheroccupation : 'N/A' }}</p>
                        </div>
                        <div>
                            <x-input-label for="motherreligion" :value="__('Mother\'s Religion')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ !empty($applicant->motherreligion) ? $applicant->motherreligion : 'N/A' }}</p>
                        </div>

                    </div>
                    <hr class="my-6">
                    @if (!empty($applicant->parentstatus))
                        <div>
                            <x-input-label for="parentstatus" :value="__('Parent\'s Status')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ !empty($applicant->parentstatus) ? $applicant->parentstatus : 'N/A' }}</p>
                        </div>
                    @endif
                    <hr class="my-6">
                    @if (!empty($applicant->guardianname))
                        <div class="grid grid-cols-2 gap-6 my-6">
                            <div>
                                <x-input-label for="guardianname" :value="__('Guardian Name')" class="uppercase" />
                                <p class="font-black text-xl text-gray-700 uppercase">{{ $applicant->guardianname }}
                                </p>
                            </div>

                            <div>
                                <x-input-label for="guardiancontactno" :value="__('Contact Number')" class="uppercase" />
                                <p class="font-black text-xl text-gray-700">{{ $applicant->guardiancontactno }}</p>
                            </div>
                        </div>
                    @endif

                    <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        PWD Family Members Information
                    </h6>
                    @forelse ($applicant->pwdMembers as $pwd)
                        <div class="grid grid-cols-2 gap-6 my-6">
                            <div>
                                <x-input-label for="pwdname" :value="__('Name')" class="uppercase" />
                                <p class="font-black text-xl text-gray-700 uppercase">{{ $pwd->pwdname }}</p>
                            </div>
                            <div>
                                <x-input-label for="pwdage" :value="__('Age')" />
                                <p class="font-black text-xl text-gray-700">{{ $pwd->pwdage }}</p>
                            </div>
                        </div>
                    @empty
                        <p class="font-black text-xl text-gray-700 uppercase">{{ 'No PWD Family Member' }}</p>
                    @endforelse

                    <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        IBANG MGA KAPATID NA NAGAARAL O NAGTRATRABAHO
                    </h6>
                    @forelse ($applicant->siblingMembers as $sibling)
                        <div class="grid lg:grid-cols-3 md:grid-cols-3 sm:grid-cols-2 min-[320px]:grid-cols-1 gap-6 my-6">
                            <div>
                                <x-input-label for="siblingname" :value="__('Pangalan')" class="uppercase" />
                                <p class="font-black text-xl text-gray-700 uppercase">{{ $sibling->siblingname }}</p>
                            </div>
                            <div>
                                <x-input-label for="siblingage" :value="__('Edad')" />
                                <p class="font-black text-xl text-gray-700">{{ $sibling->siblingage }}</p>
                            </div>
                            <div>
                                <x-input-label for="siblingyearorwork" :value="__('Nag-aaral o Nagtatrabaho')" class="uppercase" />
                                <p class="font-black text-xl text-gray-700 uppercase">
                                    {{ $sibling->siblingyearorwork }}</p>
                            </div>
                        </div>
                        <hr>
                    @empty
                        <p class="font-black text-xl text-gray-700 uppercase">{{ 'No Sibling Family Member' }}</p>
                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    @endforelse
                    <div class="grid grid-cols-2 gap-6 my-6">
                        <div>
                            <x-input-label for="siblingsnumberofworking" :value="__('Bilang ng mga kapatid na nagtatrabaho')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ $applicant->siblingsnumberofworking > 0 ? $applicant->siblingsnumberofworking : 'N/A' }}
                            </p>
                        </div>
                        <div>
                            <x-input-label for="siblingstotalincome" :value="__('Kabuuang Kita')" class="uppercase" />
                            <p class="font-black text-xl text-gray-700">
                                {{ $applicant->siblingstotalincome > 0 ? '₱' . number_format($applicant->siblingstotalincome, 2) : 'N/A' }}
                            </p>
                        </div>
                    </div>

                    <hr class="mt-6 border-b-1 w-full border-blueGray-300">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Miyembro ka ba ng mga ministro?
                    </h6>
                    <div class="gap-6 my-6">
                        <x-input-label for="applicantministry" :value="__('Applicant\'s Ministry')" class="uppercase" />
                        @if (!empty($applicant->applicantministry))
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ $applicant->ministryApplicant->ministryname }}</p>
                        @else
                            <p class="font-black text-xl text-gray-700 uppercase">{{ 'No Ministry' }}</p>
                        @endif
                    </div>

                    <hr class="mt-6 border-b-1 w-full border-blueGray-300">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Miyembro ba ang magulang sa kahit anong ministro ng parokya?
                    </h6>
                    <div class="gap-6 my-6">
                        <x-input-label for="parentapplicantministry" :value="__('Parent Applicant\'s Ministry')" class="uppercase" />
                        @if (!empty($applicant->parentapplicantministry))
                            <p class="font-black text-xl text-gray-700 uppercase">
                                {{ $applicant->ministryParentApplicant->ministryname }}</p>
                        @else
                            <p class="font-black text-xl text-gray-700 uppercase">{{ 'No Ministry' }}</p>
                        @endif
                    </div>

                    <hr class="mt-6 border-b-1 w-full border-blueGray-300">
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Iba pang kasama sa tirahan <span><i>(Kamag-anak, Pamangkin, Lolo, Lola, etc.)</i></span>
                    </h6>
                    @forelse ($applicant->otherMembers as $other)
                        <div class="grid lg:grid-cols-4 md:grid-cols-4 sm:grid-cols-2 min-[320px]:grid-cols-2 gap-6 my-6">
                            <div>
                                <x-input-label for="relativename" :value="__('Pangalan')" class="uppercase" />
                                <p class="font-black text-xl text-gray-700 uppercase">{{ $other->relativename }}</p>
                            </div>
                            <div>
                                <x-input-label for="relativeage" :value="__('Edad')" />
                                <p class="font-black text-xl text-gray-700">{{ $other->relativeage }}</p>
                            </div>
                            <div>
                                <x-input-label for="relativerelation" :value="__('Relasyon')" class="uppercase" />
                                <p class="font-black text-xl text-gray-700 uppercase">{{ $other->relativerelation }}
                                </p>
                            </div>
                            <div>
                                <x-input-label for="relativework" :value="__('Relasyon')" class="uppercase" />
                                <p class="font-black text-xl text-gray-700 uppercase">{{ $other->relativework }}</p>
                            </div>
                        </div>
                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    @empty
                        <p class="font-black text-xl text-gray-700 uppercase">{{ 'No Other Family Member' }}</p>
                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                    @endforelse

                    
                    <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                        Requirements (Clear Copy)
                    </h6>
                    <div class="max-w-xl">
                        @if ($applicant->renewal == 'NEW')
                            <div class="mb-4">
                                <!-- Upload Baptismal Cert -->
                                <x-input-label class="my-2 uppercase " for="file_input_baptismal"
                                    value="Baptismal Certificate" />
                                <x-text-input class="mt-1 block w-full bg-slate-200" type="text"
                                    value="{{ !empty($applicant->getFirstMedia('baptismal_new')->file_name) ? $applicant->getFirstMedia('baptismal_new')->file_name : null }}"
                                    disabled />
                                <a href="{{ $applicant->getFirstMediaUrl('baptismal_new') }}" target="_blank">
                                    <x-primary-button class="mt-2 bg-blue-700">View Baptismal Certificate
                                    </x-primary-button>
                                </a>
                            </div>

                            <div class="mb-4">
                                <!-- Upload Birth Cert -->
                                <x-input-label class="my-2 uppercase " for="file_input_birth"
                                    value="Birth Certificate" />
                                <x-text-input class="mt-1 block w-full bg-slate-200" type="text"
                                    value="{{ !empty($applicant->getFirstMedia('birth_new')->file_name) ? $applicant->getFirstMedia('birth_new')->file_name : null }}"
                                    disabled />
                                <a href="{{ $applicant->getFirstMediaUrl('birth_new') }}" target="_blank">
                                    <x-primary-button class="mt-2 bg-blue-700">View Birth Certificate
                                    </x-primary-button>
                                </a>
                            </div>
                        @endif
                            {{-- <div class="mb-4">
                                <!-- Upload Registration Form/Report Card -->
                                <x-input-label class="my-2 uppercase " for="file_input_regi_report"
                                    value="Report Card/Registration Form" />
                                <x-text-input class="mt-1 block w-full bg-slate-200" type="text"
                                    value="{{ !empty($applicant->getFirstMedia('regi_report_new')->file_name) ? $applicant->getFirstMedia('regi_report_new')->file_name : null }}"
                                    disabled />
                                <a href="{{ $applicant->getFirstMediaUrl('regi_report_new') }}" target="_blank">
                                    <x-primary-button class="mt-2 bg-blue-700">View Birth Certificate
                                    </x-primary-button>
                                </a>
                            </div> --}}
                        {{-- @elseif ($applicant->renewal == 'OLD')
                            <div class="mb-4">
                                <!-- Upload Registration Form -->
                                <x-input-label class="my-2 uppercase " for="file_input_regi"
                                    value="Registration Form" />
                                <x-text-input class="mt-1 block w-full bg-slate-200" type="text"
                                    value="{{ !empty($applicant->getFirstMedia('regi_old')->file_name) ? $applicant->getFirstMedia('regi_old')->file_name : null }}"
                                    disabled />
                                <a href="{{ $applicant->getFirstMediaUrl('regi_old') }}" target="_blank">
                                    <x-primary-button class="mt-2 bg-blue-700">View Registration Certificate
                                    </x-primary-button>
                                </a>
                            </div>

                            <div class="mb-4">
                                <!-- Upload Report Card -->
                                <x-input-label class="my-2 uppercase " for="file_input_report" value="Report Card" />
                                <x-text-input class="mt-1 block w-full bg-slate-200" type="text"
                                    value="{{ !empty($applicant->getFirstMedia('report_old')->file_name) ? $applicant->getFirstMedia('report_old')->file_name : null }}"
                                    disabled />
                                <a href="{{ $applicant->getFirstMediaUrl('report_old') }}" target="_blank">
                                    <x-primary-button class="mt-2 bg-blue-700">View Report Card</x-primary-button>
                                </a>
                            </div> --}}
                        
                        <div class="mb-4">
                            <!-- Upload Registration Form -->
                            <x-input-label class="my-2 uppercase " for="file_input_regi"
                                value="Registration Form" />
                            <x-text-input class="mt-1 block w-full bg-slate-200" type="text"
                                value="{{ !empty($applicant->getFirstMedia('applicant_regi')->file_name) ? $applicant->getFirstMedia('applicant_regi')->file_name : null }}"
                                disabled />
                            <a href="{{ $applicant->getFirstMediaUrl('applicant_regi') }}" target="_blank">
                                <x-primary-button class="mt-2 bg-blue-700">View Registration Certificate
                                </x-primary-button>
                            </a>
                        </div>

                        <div class="mb-4">
                            <!-- Upload Report Card -->
                            <x-input-label class="my-2 uppercase " for="file_input_report" value="Report Card" />
                            <x-text-input class="mt-1 block w-full bg-slate-200" type="text"
                                value="{{ !empty($applicant->getFirstMedia('applicant_report')->file_name) ? $applicant->getFirstMedia('applicant_report')->file_name : null }}"
                                disabled />
                            <a href="{{ $applicant->getFirstMediaUrl('applicant_report') }}" target="_blank">
                                <x-primary-button class="mt-2 bg-blue-700">View Report Card</x-primary-button>
                            </a>
                        </div>
                    </div>
                    {{-- Scroll to Top Button --}}
                    <button type="button" data-mdb-ripple="true" data-mdb-ripple-color="light" class="fixed hidden p-3 bg-blue-600 text-white font-medium text-xs leading-tight uppercase rounded-full shadow-md hover:bg-blue-700 hover:shadow-lg focus:bg-blue-700 focus:shadow-lg focus:outline-none focus:ring-0 active:bg-blue-800 active:shadow-lg transition duration-150 ease-in-out bottom-5 right-5" id="btn-back-to-top">
                        <svg aria-hidden="true" focusable="false" data-prefix="fas" class="w-4 h-4" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M34.9 289.5l-22.2-22.2c-9.4-9.4-9.4-24.6 0-33.9L207 39c9.4-9.4 24.6-9.4 33.9 0l194.3 194.3c9.4 9.4 9.4 24.6 0 33.9L413 289.4c-9.5 9.5-25 9.3-34.3-.4L264 168.6V456c0 13.3-10.7 24-24 24h-32c-13.3 0-24-10.7-24-24V168.6L69.2 289.1c-9.3 9.8-24.8 10-34.3.4z"></path></svg>
                    </button>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
<script>
    // Get the button
    let mybutton = document.getElementById("btn-back-to-top");

    // When the user scrolls down 20px from the top of the document, show the button
    window.onscroll = function() {
        scrollFunction();
    };

    function scrollFunction() {
        if (
            document.body.scrollTop > 20 ||
            document.documentElement.scrollTop > 20
        ) {
            mybutton.style.display = "block";
        } else {
            mybutton.style.display = "none";
        }
    }
    // When the user clicks on the button, scroll to the top of the document
    mybutton.addEventListener("click", backToTop);

    function backToTop() {
        document.body.scrollTop = 0;
        document.documentElement.scrollTop = 0;
    }
</script>
