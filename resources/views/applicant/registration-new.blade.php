<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <form id="registration-form" action="{{ route('registration.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Applicant's Information
                        </h6>
                        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6 ">
                            <div>   
                                <x-input-label for="kawan_id" :value="__('Kawan')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="kawan_id" id="kawan_id">
                                    <option {{ old('kawan_id') == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('kawan_id') == 'AH' ? 'selected' : '' }} value="AH">AYALA HILLSIDE</option>
                                    <option {{ old('kawan_id') == 'AV' ? 'selected' : '' }} value="AV">ALPHA VILLAGE</option>
                                    <option {{ old('kawan_id') == 'C' ? 'selected' : '' }} value="C">CENTRO</option>
                                    <option {{ old('kawan_id') == 'CG' ? 'selected' : '' }} value="CG">CH GOLF</option>
                                    <option {{ old('kawan_id') == 'DM' ? 'selected' : '' }} value="DM">DIVINE MERCY</option>
                                    <option {{ old('kawan_id') == 'OLL-S' ? 'selected' : '' }} value="OLL-S">OUT LADY OF LOURDES - SOFIA</option>
                                    <option {{ old('kawan_id') == 'SG' ? 'selected' : '' }} value="SG">SITIO GABIHAN</option>
                                    <option {{ old('kawan_id') == 'SK' ? 'selected' : '' }} value="SK">SAPANG KANGKONG</option>
                                    <option {{ old('kawan_id') == 'SN' ? 'selected' : '' }} value="SN">STO. NIÑO</option>
                                    <option {{ old('kawan_id') == 'SP' ? 'selected' : '' }} value="SP">SITIO PAYONG</option>
                                    <option {{ old('kawan_id') == 'STCJ-H' ? 'selected' : '' }} value="STCJ-H">ST. THERESE OF THE CHILD JESUS - HOBART</option>
                                    <option {{ old('kawan_id') == 'VH' ? 'selected' : '' }} value="VH">VISAYAN HILLS</option>
                                </select>
                                <x-input-error :messages="$errors->get('kawan_id')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="renewal" :value="__('Are you new or old?')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="renewal" id="renewal">
                                    <option {{ old('renewal') == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('renewal') == 'OLD' ? 'selected' : '' }} value="OLD">Old Applicant</option>
                                    <option {{ old('renewal') == 'NEW' ? 'selected' : '' }} value="NEW">New Applicant</option>
                                </select>
                                <x-input-error :messages="$errors->get('renewal')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="scholaryears" :value="__('Years As EAP Scholar')" class="uppercase"/>
                                <x-text-input id="scholaryears" class="mt-1 block w-full" type="number" name="scholaryears" value="{{ old('scholaryears') }}"/>
                                <x-input-error :messages="$errors->get('scholaryears')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="genave" :value="__('Gen. Ave')" class="uppercase"/>
                                <x-text-input id="genave" class="mt-1 block w-full" type="number" name="genave" value=" 
                                    {{  old('genave') != '' ? old('genave') : null }}
                                    {{  old('elemtohsgenave') != '' ? old('elemtohsgenave') : null }}
                                    {{  old('collegegenave') != '' ? old('collegegenave') : null }}
                                " step="any"/>
                                @if (!empty($errors->get('elemtohsgenave')))
                                    <x-input-error :messages="$errors->get('elemtohsgenave')" class="mt-2" />
                                @elseif (!empty($errors->get('collegegenave')))
                                    <x-input-error :messages="$errors->get('collegegenave')" class="mt-2" />
                                @else
                                    <x-input-error :messages="$errors->get('genave')" class="mt-2"/>
                                @endif
                            </div>
                        </div>
                        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6">
                            <div>
                                <x-input-label for="applicantfirstname" :value="__('First Name')" class="uppercase"/>
                                <x-text-input id="applicantfirstname" class="mt-1 block w-full uppercase" type="text" name="applicantfirstname" value="{{ old('applicantfirstname') }}" autocomplete="firstname" />
                                <x-input-error :messages="$errors->get('applicantfirstname')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="applicantmiddlename" :value="__('Middle Name')" class="uppercase"/>
                                <x-text-input id="applicantmiddlename" class="mt-1 block w-full uppercase" type="text" name="applicantmiddlename" value="{{ old('applicantmiddlename') }}" autocomplete="middlename" />
                                <x-input-error :messages="$errors->get('applicantmiddlename')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="applicantlastname" :value="__('Last Name')" class="uppercase"/>
                                <x-text-input id="applicantlastname" class="mt-1 block w-full uppercase" type="text" name="applicantlastname" value="{{ old('applicantlastname') }}" autocomplete="lastname" />
                                <x-input-error :messages="$errors->get('applicantlastname')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="applicantsuffix" :value="__('Suffix')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="applicantsuffix" id="applicantsuffix">
                                    <option {{ old('applicantsuffix') == '' ? 'selected' : '' }} selected value=""></option>
                                    <option {{ old('applicantsuffix') == 'SR.' ? 'selected' : '' }} value="SR.">SR.</option>
                                    <option {{ old('applicantsuffix') == 'JR.' ? 'selected' : '' }} value="JR.">JR.</option>
                                    <option {{ old('applicantsuffix') == 'I' ? 'selected' : '' }} value="I">I</option>
                                    <option {{ old('applicantsuffix') == 'II' ? 'selected' : '' }} value="II">II</option>
                                    <option {{ old('applicantsuffix') == 'III' ? 'selected' : '' }} value="III">III</option>
                                    <option {{ old('applicantsuffix') == 'IV' ? 'selected' : '' }} value="IV">IV</option>
                                    <option {{ old('applicantsuffix') == 'V' ? 'selected' : '' }} value="V">V</option>
                                </select>
                                <x-input-error :messages="$errors->get('applicantsuffix')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 gap-6 my-6">
                            <div>
                                <x-input-label for="applicantbirthdate" :value="__('Birthdate (year-month-day)')" class="uppercase"/>
                                <x-text-input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" id="applicantbirthdate" name="applicantbirthdate" type="text" class="mt-1 block w-full" value="{{ old('applicantbirthdate') }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('applicantbirthdate')" />
                            </div>
                            <div>
                                <x-input-label for="applicantsex" :value="__('Sex')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="applicantsex" id="applicantsex" >
                                    <option {{ old('applicantsex') == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('applicantsex') == 'MALE' ? 'selected' : '' }} value="MALE">MALE</option>
                                    <option {{ old('applicantsex') == 'FEMALE' ? 'selected' : '' }} value="FEMALE">FEMALE</option>
                                </select>
                                <x-input-error :messages="$errors->get('applicantsex')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="applicantcontactno" :value="__('Contact Number')" class="uppercase"/>
                                <x-text-input id="applicantcontactno" class="block mt-1 w-full" type="text" name="applicantcontactno" value="{{ old('applicantcontactno') }}" autocomplete="contactno"/>
                                <x-input-error :messages="$errors->get('applicantcontactno')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-6 my-6"> 
                            <div>
                                <x-input-label for="applicantaddress" :value="__('Address')" class="uppercase"/>
                                <x-text-input id="applicantaddress" class="block mt-1 w-full uppercase" type="text" name="applicantaddress" value="{{ old('applicantaddress') }}" autocomplete="address" />
                                <x-input-error :messages="$errors->get('applicantaddress')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid lg:grid-cols-3 md:grid-cols-1 sm:grid-cols-1 gap-6 my-6"> 
                            <div>
                                <x-input-label for="gradeyearorlevel" :value="__('Incoming Grade Or Year Level')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="gradeyearorlevel" id="gradeyearorlevel">
                                    <option {{ old('gradeyearorlevel') == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('gradeyearorlevel') == 'GRADE 1' ? 'selected' : '' }} value="{{ "GRADE 1" }}">GRADE 1</option>
                                    <option {{ old('gradeyearorlevel') == 'GRADE 2' ? 'selected' : '' }} value="{{ "GRADE 2" }}">GRADE 2</option>
                                    <option {{ old('gradeyearorlevel') == 'GRADE 3' ? 'selected' : '' }} value="{{ "GRADE 3" }}">GRADE 3</option>
                                    <option {{ old('gradeyearorlevel') == 'GRADE 4' ? 'selected' : '' }} value="{{ "GRADE 4" }}">GRADE 4</option>
                                    <option {{ old('gradeyearorlevel') == 'GRADE 5' ? 'selected' : '' }} value="{{ "GRADE 5" }}">GRADE 5</option>
                                    <option {{ old('gradeyearorlevel') == 'GRADE 6' ? 'selected' : '' }} value="{{ "GRADE 6" }}">GRADE 6</option>
                                    <option {{ old('gradeyearorlevel') == 'GRADE 7' ? 'selected' : '' }} value="{{ "GRADE 7" }}">GRADE 7</option>
                                    <option {{ old('gradeyearorlevel') == 'GRADE 8' ? 'selected' : '' }} value="{{ "GRADE 8" }}">GRADE 8</option>
                                    <option {{ old('gradeyearorlevel') == 'GRADE 9' ? 'selected' : '' }} value="{{ "GRADE 9" }}">GRADE 9</option>
                                    <option {{ old('gradeyearorlevel') == 'GRADE 10' ? 'selected' : '' }} value="{{ "GRADE 10" }}">GRADE 10</option>
                                    <option {{ old('gradeyearorlevel') == 'GRADE 11' ? 'selected' : '' }} value="{{ "GRADE 11" }}">GRADE 11</option>
                                    <option {{ old('gradeyearorlevel') == 'GRADE 12' ? 'selected' : '' }} value="{{ "GRADE 12" }}">GRADE 12</option>
                                    <option {{ old('gradeyearorlevel') == '1ST YEAR COLLEGE' ? 'selected' : '' }} value="{{ "1ST YEAR COLLEGE" }}">1ST YEAR COLLEGE</option>
                                    <option {{ old('gradeyearorlevel') == '2ND YEAR COLLEGE' ? 'selected' : '' }} value="{{ "2ND YEAR COLLEGE" }}">2ND YEAR COLLEGE</option>
                                    <option {{ old('gradeyearorlevel') == '3RD YEAR COLLEGE' ? 'selected' : '' }} value="{{ "3RD YEAR COLLEGE" }}">3RD YEAR COLLEGE</option>
                                    <option {{ old('gradeyearorlevel') == '4TH YEAR COLLEGE' ? 'selected' : '' }} value="{{ "4TH YEAR COLLEGE" }}">4TH YEAR COLLEGE</option>
                                </select>
                                <x-input-error :messages="$errors->get('gradeyearorlevel')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="course" :value="__('COURSE (not abbreviated)')"/>
                                <x-text-input id="course" class="block mt-1 w-full uppercase " type="text" name="course" value="{{ old('course') }}" autocomplete="course" />
                                <x-input-error :messages="$errors->get('course')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="schoolname" :value="__('NAME OF SCHOOL (not abbreviated)')" />
                                <x-text-input id="schoolname" class="block mt-1 w-full uppercase" type="text" name="schoolname" value="{{ old('schoolname') }}" autocomplete="schoolname" />
                                <x-input-error :messages="$errors->get('schoolname')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-6 my-6"> 
                            <div>
                                <x-input-label for="schooladdress" :value="__('School Address')" class="uppercase"/>
                                <x-text-input id="schooladdress" class="block mt-1 w-full uppercase" type="text" name="schooladdress" value="{{ old('schooladdress') }}" autocomplete="address" />
                                <x-input-error :messages="$errors->get('schooladdress')" class="mt-2" />
                            </div>
                        </div>

                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Parent's Information
                        </h6>

                        <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 gap-6 my-6">
                            <div>
                                <x-input-label for="fathername" :value="__('Father\'s Name')" class="uppercase"/>
                                <x-text-input id="fathername" class="block mt-1 w-full uppercase" type="text" name="fathername" value="{{ old('fathername') }}" autocomplete="name" />
                                <x-input-error :messages="$errors->get('fathername')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="fatherage" :value="__('Father\'s Age')" class="uppercase"/>
                                <x-text-input id="fatherage" class="block mt-1 w-full uppercase" type="number" name="fatherage" value="{{ old('fatherage') }}" />
                                <x-input-error :messages="$errors->get('fatherage')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="fatheroccupation" :value="__('Father\'s Occupation')" class="uppercase"/>
                                <x-text-input id="fatheroccupation" class="block mt-1 w-full uppercase" type="text" name="fatheroccupation" value="{{ old('fatheroccupation') }}" autocomplete="occupation" />
                                <x-input-error :messages="$errors->get('fatheroccupation')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="fatherincome" :value="__('Father\'s Monthly Income')" class="uppercase"/>
                                <x-text-input id="fatherincome" class="block mt-1 w-full" type="number" name="fatherincome" value="{{ old('fatherincome') }}" />
                                <x-input-error :messages="$errors->get('fatherincome')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="fathercontactno" :value="__('Father\'s Contact Number')" class="uppercase"/>
                                <x-text-input id="fathercontactno" class="block mt-1 w-full" type="text" name="fathercontactno" value="{{ old('fathercontactno') }}" autocomplete="contactno" />
                                <x-input-error :messages="$errors->get('fathercontactno')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="fatherreligion" :value="__('Father\'s Religion')" class="uppercase"/>
                                <x-text-input id="fatherreligion" class="block mt-1 w-full uppercase" type="text" name="fatherreligion" value="{{ old('fatherreligion') }}" autocomplete="religion" />
                                <x-input-error :messages="$errors->get('fatherreligion')" class="mt-2" />
                            </div>
                        </div>
                        
                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid lg:grid-cols-3 md:grid-cols-2 sm:grid-cols-2 gap-6 my-6">
                            <div>
                                <x-input-label for="mothername" :value="__('Mother\'s Name')" class="uppercase"/>
                                <x-text-input id="mothername" class="block mt-1 w-full uppercase" type="text" name="mothername" value="{{ old('mothername') }}" autocomplete="name" />
                                <x-input-error :messages="$errors->get('mothername')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="motherage" :value="__('Mother\'s Age')" class="uppercase"/>
                                <x-text-input id="motherage" class="block mt-1 w-full " type="number" name="motherage" value="{{ old('motherage') }}" />
                                <x-input-error :messages="$errors->get('motherage')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="motheroccupation" :value="__('Mother\'s Occupation')" class="uppercase"/>
                                <x-text-input id="motheroccupation" class="block mt-1 w-full uppercase" type="text" name="motheroccupation" value="{{ old('motheroccupation') }}" autocomplete="occupation" />
                                <x-input-error :messages="$errors->get('motheroccupation')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="motherincome" :value="__('Mother\'s Monthly Income')" class="uppercase"/>
                                <x-text-input id="motherincome" class="block mt-1 w-full" type="number" name="motherincome" value="{{ old('motherincome') }}" />
                                <x-input-error :messages="$errors->get('motherincome')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="mothercontactno" :value="__('Mother\'s Contact Number')" class="uppercase"/>
                                <x-text-input id="mothercontactno" class="block mt-1 w-full" type="text" name="mothercontactno" value="{{ old('mothercontactno') }}" autocomplete="contactno" />
                                <x-input-error :messages="$errors->get('mothercontactno')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="motherreligion" :value="__('Mother\'s Religion')" class="uppercase"/>
                                <x-text-input id="motherreligion" class="block mt-1 w-full uppercase" type="text" name="motherreligion" value="{{ old('motherreligion') }}" autocomplete="religion" />
                                <x-input-error :messages="$errors->get('motherreligion')" class="mt-2" />
                            </div>
                        </div>
                        
                        <div class="gap-6 my-6">
                            <x-input-label for="parentstatus" :value="__('Parent Status')" class="uppercase"/>
                            <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase " name="parentstatus" id="parentstatus" >
                                <option {{ old('parentstatus') == '' ? 'selected' : '' }} value="" selected></option>
                                <option {{ old('parentstatus') == 'MARRIED IN CHURCH' ? 'selected' : '' }} value="{{ "MARRIED IN CHURCH" }}">MARRIED IN CHURCH</option>
                                <option {{ old('parentstatus') == 'CIVIL WEDDING' ? 'selected' : '' }} value="{{ "CIVIL WEDDING" }}">CIVIL WEDDING</option>
                                <option {{ old('parentstatus') == 'SEPERATED' ? 'selected' : '' }} value="{{ "SEPERATED" }}">SEPERATED</option>
                                <option {{ old('parentstatus') == 'LIVE IN' ? 'selected' : '' }} value="{{ "LIVE IN" }}">LIVE IN</option>
                                <option {{ old('parentstatus') == 'SOLO PARENT' ? 'selected' : '' }} value="{{ "SOLO PARENT" }}">SOLO PARENT</option>
                            </select>
                            <x-input-error :messages="$errors->get('parentstatus')" class="mt-2" />
                        </div>
                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6">
                            <div>
                                <x-input-label for="guardianname" value="If not living with the parent, NAME OF THE GUARDIAN" class="uppercase"/>
                                <x-text-input id="guardianname" class="block mt-1 w-full uppercase" type="text" name="guardianname" value="{{ old('guardianname') }}" autocomplete="name" />
                                <x-input-error :messages="$errors->get('guardianname')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="guardiancontactno" :value="__('Contact Number')" class="uppercase"/>
                                <x-text-input id="guardiancontactno" class="block mt-1 w-full" type="text" name="guardiancontactno" value="{{ old('guardiancontactno') }}" autocomplete="contactno" />
                                <x-input-error :messages="$errors->get('guardiancontactno')" class="mt-2" />
                            </div>
                        </div>

                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            PWD (Persons With Disabilities) Family Members Information
                        </h6>
                        @foreach (range(0, 2) as $id)
                            <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6">
                                <div>
                                    <x-input-label for="pwdname-{{ $id }}" :value="__('Name (Leave blank if empty)')" class="uppercase"/>
                                    <x-text-input id="pwdname-{{ $id }}" class="block mt-1 w-full uppercase " type="text" name="pwdname[]" value="{{ old('pwdname.'.$id) }}" autocomplete="name" />
                                    <x-input-error :messages="$errors->get('pwdname.'.$id)" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="pwdage-{{ $id }}" :value="__('Age')" class="uppercase"/>
                                    <x-text-input id="pwdage-{{ $id }}" class="block mt-1 w-full" type="number" name="pwdage[]" value="{{ old('pwdage.'.$id) }}" />
                                    <x-input-error :messages="$errors->get('pwdage.'.$id)" class="mt-2" />
                                </div>
                            </div>
                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
                        @endforeach

                        <div class="my-4"></div>
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            IBANG MGA KAPATID NA NAG-AARAL O MAY TRABAHO
                        </h6>
                        @foreach (range(0, 3) as $id)
                            <div class="grid lg:grid-cols-3 sm:grid-cols-2 gap-6 my-6">
                                <div>
                                    <x-input-label for="siblingname-{{ $id }}" value="Pangalan (Leave blank if empty)" class="uppercase"/>
                                    <x-text-input id="siblingname-{{ $id }}" class="block mt-1 w-full uppercase" type="text" name="siblingname[]" value="{{ old('siblingname.'.$id) }}" autocomplete="name" />
                                    <x-input-error :messages="$errors->get('siblingname.'.$id)" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="siblingage-{{ $id }}" :value="__('Age')" class="uppercase"/>
                                    <x-text-input id="siblingage-{{ $id }}" class="block mt-1 w-full" type="number" name="siblingage[]" value="{{ old('siblingage.'.$id) }}" />
                                    <x-input-error :messages="$errors->get('siblingage.'.$id)" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="siblingyearorwork-{{ $id }}" :value="__('Year Level Or Work')" class="uppercase"/>
                                    <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase " name="siblingyearorwork[]" id="siblingyearorwork-{{ $id }}" >
                                        <option {{ old('siblingyearorwork.'.$id) == '' ? 'selected' : '' }} value="" selected></option>
                                        <option {{ old('siblingyearorwork.'.$id) == 'ELEMENTARY' ? 'selected' : '' }} value="ELEMENTARY">ELEMENTARY</option>
                                        <option {{ old('siblingyearorwork.'.$id) == 'HIGH SCHOOL' ? 'selected' : '' }} value="{{ "HIGH SCHOOL" }}">HIGH SCHOOL</option>
                                        <option {{ old('siblingyearorwork.'.$id) == 'COLLEGE' ? 'selected' : '' }} value="COLLEGE">COLLEGE</option>
                                        <option {{ old('siblingyearorwork.'.$id) == 'WORKING' ? 'selected' : '' }} value="WORKING">WORKING</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('siblingyearorwork.'.$id)" class="mt-2" />
                                </div>
                            </div>
                            <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
                        @endforeach
                        <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6">
                            <div>
                                <x-input-label for="siblingsnumberofworking" :value="__('Bilang ng (mga) kapatid na nagtatrabaho')" class="uppercase"/>
                                <x-text-input id="siblingsnumberofworking" class="block mt-1 w-full uppercase" type="number" name="siblingsnumberofworking" value="{{ old('siblingsnumberofworking') }}" />
                                <x-input-error :messages="$errors->get('siblingsnumberofworking')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="siblingstotalincome" :value="__('Kabuuang Buwang Kita')" class="uppercase"/>
                                <x-text-input id="siblingstotalincome" class="block mt-1 w-full" type="number" name="siblingstotalincome" value="{{ old('siblingstotalincome') }}" />
                                <x-input-error :messages="$errors->get('siblingstotalincome')" class="mt-2" />
                            </div>
                        </div>

                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            MIYEMBRO KA BA NG KAHIT NA ANONG MINISTRY NG PAROKYA?
                        </h6>
                        <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6">
                            <div>
                                <x-input-label for="applicantministryans" :value="__('Sagot')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="applicantministryans" id="applicantministryans">
                                    <option {{ old('applicantministryans') == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('applicantministryans') == 'OO' ? 'selected' : '' }} value="OO">OO</option>
                                    <option {{ old('applicantministryans') == 'HINDI' ? 'selected' : '' }} value="HINDI">HINDI</option>
                                </select>
                                <x-input-error :messages="$errors->get('applicantministryans')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="applicantministry" :value="__('Kung Oo, anong ministry?')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm " name="applicantministry" id="applicantministry">
                                    <option {{ old('applicantministry') == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('applicantministry') == 'Choir' ? 'selected' : '' }} value="Choir">LITURGICAL MUSIC MINISTRY</option>
                                    <option {{ old('applicantministry') == 'FOG' ? 'selected' : '' }} value="FOG">FAMILY OF GOD MINISTRY</option>
                                    <option {{ old('applicantministry') == 'L&C' ? 'selected' : '' }} value="L&C">LECTOR AND COMMENTATOR MINISTRY</option>
                                    <option {{ old('applicantministry') == 'PCCVA' ? 'selected' : '' }} value="PCCVA">PASTORAL CARE FOR CHILDREN AND VULNERABLE ADULTS MINISTRY</option>
                                    <option {{ old('applicantministry') == 'Sacristan' ? 'selected' : '' }} value="Sacristan">ALTAR SERVER MINISTRY</option>
                                    <option {{ old('applicantministry') == 'SocComm' ? 'selected' : '' }} value="SocComm">SOCIAL COMMUNICATIONS MINISTRY</option>
                                    <option {{ old('applicantministry') == 'YFC' ? 'selected' : '' }} value="YFC">YOUTH FOR CHRIST MINISTRY</option>
                                </select>
                                <x-input-error :messages="$errors->get('applicantministry')" class="mt-2" />
                            </div>
                        </div>

                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            MIYEMBRO BA ANG IYONG MGA MAGULANG/GUARDIAN SA KAHIT ANONG MINISTRY NG PAROKYA?
                        </h6>
                        <div class="grid lg:grid-cols-2 md:grid-cols-2 sm:grid-cols-1 gap-6 my-6">
                            <div>
                                <x-input-label for="parentapplicantministryans" :value="__('Sagot')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="parentapplicantministryans" id="parentapplicantministryans">
                                    <option {{ old('parentapplicantministryans') == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('parentapplicantministryans') == 'OO' ? 'selected' : '' }} value="OO">OO</option>
                                    <option {{ old('parentapplicantministryans') == 'HINDI' ? 'selected' : '' }} value="HINDI">HINDI</option>
                                </select>
                                <x-input-error :messages="$errors->get('parentapplicantministryans')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="parentapplicantministry" :value="__('Kung Oo, anong ministry?')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm " name="parentapplicantministry" id="parentapplicantministry" >
                                    <option {{ old('parentapplicantministry') == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('parentapplicantministry') == 'Choir' ? 'selected' : '' }} value="Choir">LITURGICAL MUSIC MINISTRY</option>
                                    <option {{ old('parentapplicantministry') == 'FOG' ? 'selected' : '' }} value="FOG">FAMILY OF GOD MINISTRY</option>
                                    <option {{ old('parentapplicantministry') == 'L&C' ? 'selected' : '' }} value="L&C">LECTOR AND COMMENTATOR MINISTRY</option>
                                    <option {{ old('parentapplicantministry') == 'PCCVA' ? 'selected' : '' }} value="PCCVA">PASTORAL CARE FOR CHILDREN AND VULNERABLE ADULTS MINISTRY</option>
                                    <option {{ old('parentapplicantministry') == 'Sacristan' ? 'selected' : '' }} value="Sacristan">ALTAR SERVER MINISTRY</option>
                                    <option {{ old('parentapplicantministry') == 'SocComm' ? 'selected' : '' }} value="SocComm">SOCIAL COMMUNICATIONS MINISTRY</option>
                                    <option {{ old('parentapplicantministry') == 'YFC' ? 'selected' : '' }} value="YFC">YOUTH FOR CHRIST MINISTRY</option>
                                </select>
                                <x-input-error :messages="$errors->get('parentapplicantministry')" class="mt-2" />
                            </div>
                        </div>

                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            IBA PANG KASAMA SA TIRAHAN (Kamag-anak, Pamangkin, Lolo, Lola etc.)
                        </h6>
                        @foreach (range(0, 3) as $id)
                        <div class="grid lg:grid-cols-4 md:grid-cols-2 sm:grid-cols-2 gap-6 my-6">
                            <div>
                                <x-input-label for="relativename-{{ $id }}" value="Pangalan (Leave blank if empty)" class="uppercase"/>
                                <x-text-input id="relativename-{{ $id }}" class="block mt-1 w-full uppercase" type="text" name="relativename[]" value="{{ old('relativename.'.$id.'') }}" autocomplete=""/>
                                <x-input-error :messages="$errors->get('relativename.'.$id)" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="relativeage-{{ $id }}" :value="__('Edad')" class="uppercase"/>
                                <x-text-input id="relativeage-{{ $id }}" class="block mt-1 w-full" type="number" name="relativeage[]" value="{{ old('relativeage.'.$id.'') }}" autocomplete=""/>
                                <x-input-error :messages="$errors->get('relativeage.'.$id)" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="relativerelation-{{ $id }}" :value="__('Relasyon')" class="uppercase"/>
                                <x-text-input id="relativerelation-{{ $id }}" class="block mt-1 w-full uppercase" type="text" name="relativerelation[]" value="{{ old('relativerelation.'.$id.'') }}" autocomplete=""/>
                                <x-input-error :messages="$errors->get('relativerelation.'.$id)" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="relativework-{{ $id }}" :value="__('Trabaho')" class="uppercase"/>
                                <x-text-input id="relativework-{{ $id }}" class="block mt-1 w-full uppercase" type="text" name="relativework[]" value="{{ old('relativework.'.$id.'') }}" autocomplete=""/>
                                <x-input-error :messages="$errors->get('relativework.'.$id)" class="mt-2" />
                            </div>
                        </div>
                        <hr class="h-px bg-gray-200 border-0 dark:bg-gray-700">
                        @endforeach
                    
                        <div class="my-4"></div>
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Requirements (Clear Copy)
                        </h6>
                        <div class="mb-4">
                            <!-- Upload Applicant Picture -->
                            <div class="flex items-center">
                                <x-input-label class="my-2 uppercase " for="file_input_picture" id="file_input_picture_label" value="2x2 Picture"/>
                                <svg fill="none" data-tooltip-target="tooltip-2x2" data-tooltip-placement="right" class="flex-shrink-0 inline w-5 h-5 ml-3 fill-gray-300 stroke-gray-600" stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path>
                                </svg>
                                <div id="tooltip-2x2" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"><b>Example Format: </b><i> Dela Cruz, Juan-2x2 Picture</i><div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 " aria-describedby="file_input_help" id="file_input_picture" name="file_input_picture" type="file">
                            <x-input-error :messages="$errors->get('file_input_picture')" class="mt-2 mb-5" />
                        </div>

                        <div class="mb-4" id="baptismal_div">
                            <!-- Upload Baptismal Cert -->
                            <div class="flex items-center my-0 py-0">
                                <x-input-label class="mb-2 uppercase " for="file_input_baptismal" id="file_input_baptismal_label" value="Baptismal Certificate"/>
                                <svg fill="none" data-tooltip-target="tooltip-baptismal" data-tooltip-placement="right" class="flex-shrink-0 inline w-5 h-5 ml-3 fill-gray-300 stroke-gray-600 mb-2 " stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true" id="baptismal_svg"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path>
                                </svg>
                                <div id="tooltip-baptismal" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"><b>Example Format: </b><i> Dela Cruz, Juan-Baptismal Certificate</i><div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 " aria-describedby="file_input_help" id="file_input_baptismal" name="file_input_baptismal" type="file">
                            <x-input-error :messages="$errors->get('file_input_baptismal')" class="mt-2 mb-5" id="baptismal_error"/>
                        </div>
                        
                        <div class="mb-4" id="birth_div">
                            <!-- Upload Birth Cert -->
                            <div class="flex items-center my-0 py-0">
                                <x-input-label class="mb-2 uppercase " for="file_input_birth" id="file_input_birth_label" value="Birth Certificate"/>
                                <svg fill="none" data-tooltip-target="tooltip-birth" data-tooltip-placement="right" class="flex-shrink-0 inline w-5 h-5 ml-3 fill-gray-300 stroke-gray-600 mb-2 " stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path>
                                </svg>
                                <div id="tooltip-birth" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"><b>Example Format: </b><i> Dela Cruz, Juan-Birth Certificate</i><div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 " aria-describedby="file_input_help" id="file_input_birth" name="file_input_birth" type="file">
                            <x-input-error :messages="$errors->get('file_input_birth')" class="mt-2 mb-5" id="birth_error"/>
                        </div>
                            
                        {{-- <div class="mb-4" id="regi_report_div">
                            <!-- Upload Registration Form/Report Card -->
                            <div class="flex items-center my-0 py-0">
                                <x-input-label class="mb-2 uppercase " for="file_input_regi_report" id="file_input_regi_report_label" value="Report Card/Registration Form"/>
                                <svg fill="none" data-tooltip-target="tooltip-regi_report" data-tooltip-placement="right" class="flex-shrink-0 inline w-5 h-5 ml-3 fill-gray-300 stroke-gray-600 mb-2 " stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path>
                                </svg>
                                <div id="tooltip-regi_report" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                                    <b>Example Format: </b>
                                    <ul>
                                        <li class="pl-5"><b>For Elementary to High School: </b> <i>Dela Cruz, Juan-Report Card(1st Quarter)</i> OR <i>Dela Cruz, Juan-Registration Form</i></li>
                                        <li class="pl-5"><b>For Senior High School to College: </b> <i>Dela Cruz, Juan-Report Card(1st Semester)</i> OR <i>Dela Cruz, Juan-Registration Form(1st Semester)</i></li>
                                    </ul>
                                    <div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 " aria-describedby="file_input_help" id="file_input_regi_report" name="file_input_regi_report" type="file">
                            <x-input-error :messages="$errors->get('file_input_regi_report')" class="mt-2 mb-5" id="regi_report_error"/>
                        </div> --}}
                        
                        <div class="mb-4" id="regi_div">
                            <!-- Upload Registration Form -->
                            <div class="flex items-center my-0 py-0">
                                <x-input-label class="mb-2 uppercase " for="file_input_regi" id="file_input_regi_label" value="Registration Form"/>
                                <svg fill="none" data-tooltip-target="tooltip-regi" data-tooltip-placement="right" class="flex-shrink-0 inline w-5 h-5 ml-3 fill-gray-300 stroke-gray-600 mb-2 " stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path>
                                </svg>
                                <div id="tooltip-regi" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"><b>Example Format: </b><i> Dela Cruz, Juan-Registration Form</i><div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 " aria-describedby="file_input_help" id="file_input_regi" name="file_input_regi" type="file">
                            <x-input-error :messages="$errors->get('file_input_regi')" class="mt-2 mb-5" id="regi_error"/>
                        </div>

                        <div class="mb-4" id="report_div">
                            <!-- Upload Report Card -->
                            <div class="flex items-center my-0 py-0">
                                <x-input-label class="mb-2 uppercase " for="file_input_report" id="file_input_report_label" value="Report Card"/>
                                <svg fill="none" data-tooltip-target="tooltip-report" data-tooltip-placement="right" class="flex-shrink-0 inline w-5 h-5 ml-3 fill-gray-300 stroke-gray-600 mb-2 " stroke="currentColor" stroke-width="1.5" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg" aria-hidden="true"><path stroke-linecap="round" stroke-linejoin="round" d="M9.879 7.519c1.171-1.025 3.071-1.025 4.242 0 1.172 1.025 1.172 2.687 0 3.712-.203.179-.43.326-.67.442-.745.361-1.45.999-1.45 1.827v.75M21 12a9 9 0 11-18 0 9 9 0 0118 0zm-9 5.25h.008v.008H12v-.008z"></path>
                                </svg>
                                <div id="tooltip-report" role="tooltip" class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700"><b>Example Format: </b><i> Dela Cruz, Juan-Report Card</i><div class="tooltip-arrow" data-popper-arrow></div>
                                </div>
                            </div>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 " aria-describedby="file_input_help" id="file_input_report" name="file_input_report" type="file">
                            <x-input-error :messages="$errors->get('file_input_report')" class="mt-2 mb-5" id="report_error"/>
                        </div>
                        
                        <div class="flex items-baseline p-4 my-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div>
                                <span class="font-medium"><p class="text-xl font-black">NOTE:</p></span>
                                <ul class="list-disc pl-5">
                                    <li class="font-bold text-base">Only UPLOAD DOCUMENTS in JPG or PNG Format! (Max. 8MB)</li>
                                    <li class="font-semibold text-base">Please make sure that you have rename your file before submitting to reduce the chance that your submission will be rejected.</li>
                                    <li class="font-semibold text-base">Please rename the file with your name, and according to the requirements.</li>
                                </ul>
                            </div>
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="reset" class="ml-3">
                                {{ __('Reset') }}
                            </x-primary-button>

                            <x-primary-button type="button" onclick="confirmSubmit('registration-form')" class="ml-3">
                                {{ __('Submit') }}
                            </x-primary-button>

                        </div>
                    </form>
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