<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registration') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            {{-- MESSAGE!!! --}}
            <div class="flex p-4 mb-4 text-sm text-red-700 bg-red-100 rounded-lg dark:bg-red-200 dark:text-red-800" role="alert">
                <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                <span class="sr-only">Info</span>
                <div>
                    <span class="font-medium">Info alert!</span> Change a few things up and try submitting again.
                    <p class="text-xl font-black pt-3">NOTE:</p>
                    <ul class="list-disc pl-5">
                        <li class="font-bold text-lg">Please double check the inputs before resubmmiting.</li>
                        <li class="font-bold text-lg">{{ $applicant->resubmissionmessage }}</li>
                    </ul>
                </div>
            </div>

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200 ">
                    <form action="{{ route('registration.update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Applicant's Information
                        </h6>
                        <div class="grid grid-cols-4 gap-6 my-6">
                            <div>   
                                <x-input-label for="kawan_id" :value="__('Kawan')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="kawan_id" id="kawan_id">
                                    <option {{ old('kawan_id', $applicant->kawan_id) == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('kawan_id', $applicant->kawan_id) == 'AH' ? 'selected' : '' }} value="AH">AYALA HILLSIDE</option>
                                    <option {{ old('kawan_id', $applicant->kawan_id) == 'AV' ? 'selected' : '' }} value="AV">ALPHA VILLAGE</option>
                                    <option {{ old('kawan_id', $applicant->kawan_id) == 'C' ? 'selected' : '' }} value="C">CENTRO</option>
                                    <option {{ old('kawan_id', $applicant->kawan_id) == 'CG' ? 'selected' : '' }} value="CG">CH GOLF</option>
                                    <option {{ old('kawan_id', $applicant->kawan_id) == 'DM' ? 'selected' : '' }} value="DM">DIVINE MERCY</option>
                                    <option {{ old('kawan_id', $applicant->kawan_id) == 'OLL-S' ? 'selected' : '' }} value="OLL-S">OUT LADY OF LOURDES - SOFIA</option>
                                    <option {{ old('kawan_id', $applicant->kawan_id) == 'SG' ? 'selected' : '' }} value="SG">SITIO GABIHAN</option>
                                    <option {{ old('kawan_id', $applicant->kawan_id) == 'SK' ? 'selected' : '' }} value="SK">SAPANG KANGKONG</option>
                                    <option {{ old('kawan_id', $applicant->kawan_id) == 'SN' ? 'selected' : '' }} value="SN">STO. NIÑO</option>
                                    <option {{ old('kawan_id', $applicant->kawan_id) == 'SP' ? 'selected' : '' }} value="SP">SITIO PAYONG</option>
                                    <option {{ old('kawan_id', $applicant->kawan_id) == 'STCJ-H' ? 'selected' : '' }} value="STCJ-H">ST. THERESE OF THE CHILD JESUS - HOBART</option>
                                    <option {{ old('kawan_id', $applicant->kawan_id) == 'VH' ? 'selected' : '' }} value="VH">VISAYAN HILLS</option>
                                </select>
                                <x-input-error :messages="$errors->get('kawan_id')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="renewal" :value="__('Are you new or old?')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="renewal" id="renewal">
                                    <option {{ old('renewal', $applicant->renewal) == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('renewal', $applicant->renewal) == 'OLD' ? 'selected' : '' }} value="OLD">Old Applicant</option>
                                    <option {{ old('renewal', $applicant->renewal) == 'NEW' ? 'selected' : '' }} value="NEW">New Applicant</option>
                                </select>
                                <x-input-error :messages="$errors->get('renewal')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="scholaryears" :value="__('No. of Years As EAP Scholar')" class="uppercase"/>
                                <x-text-input id="scholaryears" class="mt-1 block w-full" type="number" name="scholaryears" value="{{ old('scholaryears', $applicant->scholaryears) }}"/>
                                <x-input-error :messages="$errors->get('scholaryears')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="genave" :value="__('Gen. Ave')" class="uppercase"/>
                                <x-text-input id="genave" class="mt-1 block w-full" type="number" name="genave" value=" 
                                    {{  old('genave') != '' ? old('genave') : null }}
                                    {{  old('elemtohsgenave') != '' ? old('elemtohsgenave') : null }}
                                    {{  old('collegegenave') != '' ? old('collegegenave') : null }}
                                    {{  $applicant->genave != '' ? $applicant->genave : null }}
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
                        <div class="grid grid-cols-4 gap-6 my-6">
                            <div>
                                <x-input-label for="applicantfirstname" :value="__('First Name')" class="uppercase"/>
                                <x-text-input id="applicantfirstname" class="mt-1 block w-full uppercase" type="text" name="applicantfirstname" value="{{ old('applicantfirstname', $applicant->applicantfirstname) }}" autocomplete="firstname" />
                                <x-input-error :messages="$errors->get('applicantfirstname')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="applicantmiddlename" :value="__('Middle Name')" class="uppercase"/>
                                <x-text-input id="applicantmiddlename" class="mt-1 block w-full uppercase" type="text" name="applicantmiddlename" value="{{ old('applicantmiddlename', $applicant->applicantmiddlename) }}" autocomplete="middlename" />
                                <x-input-error :messages="$errors->get('applicantmiddlename')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="applicantlastname" :value="__('Last Name')" class="uppercase"/>
                                <x-text-input id="applicantlastname" class="mt-1 block w-full uppercase" type="text" name="applicantlastname" value="{{ old('applicantlastname', $applicant->applicantlastname) }}" autocomplete="lastname" />
                                <x-input-error :messages="$errors->get('applicantlastname')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="applicantsuffix" :value="__('Suffix')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="applicantsuffix" id="applicantsuffix">
                                    <option {{ old('applicantsuffix', $applicant->applicantsuffix) == '' ? 'selected' : '' }} selected value=""></option>
                                    <option {{ old('applicantsuffix', $applicant->applicantsuffix) == 'SR.' ? 'selected' : '' }} value="SR.">SR.</option>
                                    <option {{ old('applicantsuffix', $applicant->applicantsuffix) == 'JR.' ? 'selected' : '' }} value="JR.">JR.</option>
                                    <option {{ old('applicantsuffix', $applicant->applicantsuffix) == 'I' ? 'selected' : '' }} value="I">I</option>
                                    <option {{ old('applicantsuffix', $applicant->applicantsuffix) == 'II' ? 'selected' : '' }} value="II">II</option>
                                    <option {{ old('applicantsuffix', $applicant->applicantsuffix) == 'III' ? 'selected' : '' }} value="III">III</option>
                                    <option {{ old('applicantsuffix', $applicant->applicantsuffix) == 'IV' ? 'selected' : '' }} value="IV">IV</option>
                                    <option {{ old('applicantsuffix', $applicant->applicantsuffix) == 'V' ? 'selected' : '' }} value="V">V</option>
                                </select>
                                <x-input-error :messages="$errors->get('applicantsuffix')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6 my-6">
                            <div>
                                <x-input-label for="applicantbirthdate" :value="__('Birthdate (year-month-day)')" class="uppercase"/>
                                <x-text-input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" id="applicantbirthdate" name="applicantbirthdate" type="text" class="mt-1 block w-full" value="{{ old('applicantbirthdate', $applicant->applicantbirthdate) }}" />
                                <x-input-error class="mt-2" :messages="$errors->get('applicantbirthdate')" />
                            </div>
                            <div>
                                <x-input-label for="applicantsex" :value="__('Sex')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="applicantsex" id="applicantsex" >
                                    <option {{ old('applicantsex', $applicant->applicantsex) == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('applicantsex', $applicant->applicantsex) == 'MALE' ? 'selected' : '' }} value="MALE">MALE</option>
                                    <option {{ old('applicantsex', $applicant->applicantsex) == 'FEMALE' ? 'selected' : '' }} value="FEMALE">FEMALE</option>
                                </select>
                                <x-input-error :messages="$errors->get('applicantsex')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="applicantcontactno" :value="__('Contact Number')" class="uppercase"/>
                                <x-text-input id="applicantcontactno" class="block mt-1 w-full" type="text" name="applicantcontactno" value="{{ old('applicantcontactno', $applicant->applicantcontactno) }}" autocomplete="contactno"/>
                                <x-input-error :messages="$errors->get('applicantcontactno')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-6 my-6"> 
                            <div>
                                <x-input-label for="applicantaddress" :value="__('Address')" class="uppercase"/>
                                <x-text-input id="applicantaddress" class="block mt-1 w-full uppercase" type="text" name="applicantaddress" value="{{ old('applicantaddress', $applicant->applicantaddress) }}" autocomplete="address" />
                                <x-input-error :messages="$errors->get('applicantaddress')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6 my-6"> 
                            <div>
                                <x-input-label for="gradeyearorlevel" :value="__('Incoming Grade Or Year Level')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="gradeyearorlevel" id="gradeyearorlevel">
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == 'GRADE 1' ? 'selected' : '' }} value="{{ "GRADE 1" }}">GRADE 1</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == 'GRADE 2' ? 'selected' : '' }} value="{{ "GRADE 2" }}">GRADE 2</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == 'GRADE 3' ? 'selected' : '' }} value="{{ "GRADE 3" }}">GRADE 3</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == 'GRADE 4' ? 'selected' : '' }} value="{{ "GRADE 4" }}">GRADE 4</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == 'GRADE 5' ? 'selected' : '' }} value="{{ "GRADE 5" }}">GRADE 5</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == 'GRADE 6' ? 'selected' : '' }} value="{{ "GRADE 6" }}">GRADE 6</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == 'GRADE 7' ? 'selected' : '' }} value="{{ "GRADE 7" }}">GRADE 7</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == 'GRADE 8' ? 'selected' : '' }} value="{{ "GRADE 8" }}">GRADE 8</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == 'GRADE 9' ? 'selected' : '' }} value="{{ "GRADE 9" }}">GRADE 9</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == 'GRADE 10' ? 'selected' : '' }} value="{{ "GRADE 10" }}">GRADE 10</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == 'GRADE 11' ? 'selected' : '' }} value="{{ "GRADE 11" }}">GRADE 11</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == 'GRADE 12' ? 'selected' : '' }} value="{{ "GRADE 12" }}">GRADE 12</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == '1ST YEAR COLLEGE' ? 'selected' : '' }} value="{{ "1ST YEAR COLLEGE" }}">1ST YEAR COLLEGE</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == '2ND YEAR COLLEGE' ? 'selected' : '' }} value="{{ "2ND YEAR COLLEGE" }}">2ND YEAR COLLEGE</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == '3RD YEAR COLLEGE' ? 'selected' : '' }} value="{{ "3RD YEAR COLLEGE" }}">3RD YEAR COLLEGE</option>
                                    <option {{ old('gradeyearorlevel', $applicant->gradeyearorlevel) == '4TH YEAR COLLEGE' ? 'selected' : '' }} value="{{ "4TH YEAR COLLEGE" }}">4TH YEAR COLLEGE</option>
                                </select>
                                <x-input-error :messages="$errors->get('gradeyearorlevel')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="course" :value="__('(If College) COURSE')"/>
                                <x-text-input id="course" class="block mt-1 w-full uppercase " type="text" name="course" value="{{ old('course', $applicant->course) }}" autocomplete="course" />
                                <x-input-error :messages="$errors->get('course')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="schoolname" :value="__('Name of School')" class="uppercase"/>
                                <x-text-input id="schoolname" class="block mt-1 w-full uppercase" type="text" name="schoolname" value="{{ old('schoolname', $applicant->schoolname) }}" autocomplete="schoolname" />
                                <x-input-error :messages="$errors->get('schoolname')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-6 my-6"> 
                            <div>
                                <x-input-label for="schooladdress" :value="__('School Address')" class="uppercase"/>
                                <x-text-input id="schooladdress" class="block mt-1 w-full uppercase" type="text" name="schooladdress" value="{{ old('schooladdress', $applicant->schooladdress) }}" autocomplete="address" />
                                <x-input-error :messages="$errors->get('schooladdress')" class="mt-2" />
                            </div>
                        </div>

                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Parent's Information
                        </h6>

                        <div class="grid grid-cols-3 gap-6 my-6">
                            <div>
                                <x-input-label for="fathername" :value="__('Father\'s Name')" class="uppercase"/>
                                <x-text-input id="fathername" class="block mt-1 w-full uppercase" type="text" name="fathername" value="{{ old('fathername', $applicant->fathername) }}" autocomplete="name" />
                                <x-input-error :messages="$errors->get('fathername')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="fatherage" :value="__('Age')" class="uppercase"/>
                                <x-text-input id="fatherage" class="block mt-1 w-full uppercase" type="number" name="fatherage" value="{{ old('fatherage', $applicant->fatherage) }}" />
                                <x-input-error :messages="$errors->get('fatherage')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="fatheroccupation" :value="__('Occupation')" class="uppercase"/>
                                <x-text-input id="fatheroccupation" class="block mt-1 w-full uppercase" type="text" name="fatheroccupation" value="{{ old('fatheroccupation', $applicant->fatheroccupation) }}" autocomplete="occupation" />
                                <x-input-error :messages="$errors->get('fatheroccupation')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6 my-6">
                            <div>
                                <x-input-label for="fatherincome" :value="__('Monthly Income')" class="uppercase"/>
                                <x-text-input id="fatherincome" class="block mt-1 w-full" type="number" name="fatherincome" value="{{ old('fatherincome', empty($applicant->fatherincome) ? null : intval($applicant->fatherincome)) }}" />
                                <x-input-error :messages="$errors->get('fatherincome')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="fathercontactno" :value="__('Contact Number')" class="uppercase"/>
                                <x-text-input id="fathercontactno" class="block mt-1 w-full" type="text" name="fathercontactno" value="{{ old('fathercontactno', $applicant->fathercontactno) }}" autocomplete="contactno" />
                                <x-input-error :messages="$errors->get('fathercontactno')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="fatherreligion" :value="__('Religion')" class="uppercase"/>
                                <x-text-input id="fatherreligion" class="block mt-1 w-full uppercase" type="text" name="fatherreligion" value="{{ old('fatherreligion', $applicant->fatherreligion) }}" autocomplete="religion" />
                                <x-input-error :messages="$errors->get('fatherreligion')" class="mt-2" />
                            </div>
                        </div>
                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-3 gap-6 my-6">
                            <div>
                                <x-input-label for="mothername" :value="__('Mother\'s Name')" class="uppercase"/>
                                <x-text-input id="mothername" class="block mt-1 w-full uppercase" type="text" name="mothername" value="{{ old('mothername', $applicant->mothername) }}" autocomplete="name" />
                                <x-input-error :messages="$errors->get('mothername')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="motherage" :value="__('Age')" class="uppercase"/>
                                <x-text-input id="motherage" class="block mt-1 w-full" type="number" name="motherage" value="{{ old('motherage', $applicant->motherage) }}" />
                                <x-input-error :messages="$errors->get('motherage')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="motheroccupation" :value="__('Occupation')" class="uppercase"/>
                                <x-text-input id="motheroccupation" class="block mt-1 w-full uppercase" type="text" name="motheroccupation" value="{{ old('motheroccupation', $applicant->motheroccupation) }}" autocomplete="occupation" />
                                <x-input-error :messages="$errors->get('motheroccupation')" class="mt-2" />
                            </div>
                        </div>
                        <div class="grid grid-cols-3 gap-6 my-6">
                            <div>
                                <x-input-label for="motherincome" :value="__('Monthly Income')" class="uppercase"/>
                                <x-text-input id="motherincome" class="block mt-1 w-full" type="number" name="motherincome" value="{{ old('motherincome', empty($applicant->motherincome) ? null : intval($applicant->motherincome)) }}" />
                                <x-input-error :messages="$errors->get('motherincome')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="mothercontactno" :value="__('Contact Number')" class="uppercase"/>
                                <x-text-input id="mothercontactno" class="block mt-1 w-full" type="text" name="mothercontactno" value="{{ old('mothercontactno', $applicant->mothercontactno) }}" autocomplete="contactno" />
                                <x-input-error :messages="$errors->get('mothercontactno')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="motherreligion" :value="__('Religion')" class="uppercase"/>
                                <x-text-input id="motherreligion" class="block mt-1 w-full uppercase" type="text" name="motherreligion" value="{{ old('motherreligion', $applicant->motherreligion) }}" autocomplete="religion" />
                                <x-input-error :messages="$errors->get('motherreligion')" class="mt-2" />
                            </div>
                        </div>
                        <div class="gap-6 my-6">
                            <x-input-label for="parentstatus" :value="__('Parent Status')" class="uppercase"/>
                            <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase " name="parentstatus" id="parentstatus">
                                <option {{ old('parentstatus', $applicant->parentstatus) == '' ? 'selected' : '' }} value="" selected></option>
                                <option {{ old('parentstatus', $applicant->parentstatus) == 'MARRIED IN CHURCH' ? 'selected' : '' }} value="{{ "MARRIED IN CHURCH" }}">MARRIED IN CHURCH</option>
                                <option {{ old('parentstatus', $applicant->parentstatus) == 'CIVIL WEDDING' ? 'selected' : '' }} value="{{ "CIVIL WEDDING" }}">CIVIL WEDDING</option>
                                <option {{ old('parentstatus', $applicant->parentstatus) == 'SEPERATED' ? 'selected' : '' }} value="{{ "SEPERATED" }}">SEPERATED</option>
                                <option {{ old('parentstatus', $applicant->parentstatus) == 'LIVE IN' ? 'selected' : '' }} value="{{ "LIVE IN" }}">LIVE IN</option>
                                <option {{ old('parentstatus', $applicant->parentstatus) == 'SOLO PARENT' ? 'selected' : '' }} value="{{ "SOLO PARENT" }}">SOLO PARENT</option>
                            </select>
                            <x-input-error :messages="$errors->get('parentstatus')" class="mt-2" />
                        </div>
                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <div class="grid grid-cols-2 gap-6 my-6">
                            <div>
                                <x-input-label for="guardianname" value="If not living with the parent, NAME OF THE GUARDIAN" class="uppercase"/>
                                <x-text-input id="guardianname" class="block mt-1 w-full uppercase" type="text" name="guardianname" value="{{ old('guardianname', $applicant->guardianname) }}" autocomplete="name" />
                                <x-input-error :messages="$errors->get('guardianname')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="guardiancontactno" :value="__('Contact Number')" class="uppercase"/>
                                <x-text-input id="guardiancontactno" class="block mt-1 w-full" type="text" name="guardiancontactno" value="{{ old('guardiancontactno', $applicant->guardiancontactno) }}" autocomplete="contactno" />
                                <x-input-error :messages="$errors->get('guardiancontactno')" class="mt-2" />
                            </div>
                        </div>

                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            PWD (Persons With Disabilities) Family Members Information
                        </h6>
                        @foreach (range(0, 2) as $id)
                            <div class="grid grid-cols-2 gap-6 my-6">
                                <div>
                                    <x-input-label for="pwdname-{{ $id }}" :value="__('Name')" class="uppercase"/>
                                    <x-text-input id="pwdname-{{ $id }}" class="block mt-1 w-full uppercase" type="text" name="pwdname[]" value="{{ old('pwdname.'.$id) }}" autocomplete="name" />
                                    <x-input-error :messages="$errors->get('pwdname.'.$id)" class="mt-2" />
                                </div>
                                <div>
                                    <x-input-label for="pwdage-{{ $id }}" :value="__('Age')" class="uppercase"/>
                                    <x-text-input id="pwdage-{{ $id }}" class="block mt-1 w-full" type="number" name="pwdage[]" value="{{ old('pwdage.'.$id) }}" />
                                    <x-input-error :messages="$errors->get('pwdage.'.$id)" class="mt-2" />
                                </div>
                            </div>
                        @endforeach

                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            IBANG MGA KAPATID NA NAG-AARAL O MAY TRABAHO
                        </h6>
                        @foreach (range(0, 3) as $id)
                            <div class="grid grid-cols-3 gap-6 my-6">
                                <div>
                                    <x-input-label for="siblingname-{{ $id }}" value="Pangalan" class="uppercase"/>     
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
                                    <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="siblingyearorwork[]" id="siblingyearorwork-{{ $id }}" >
                                        <option {{ old('siblingyearorwork.'.$id) == '' ? 'selected' : '' }} value="" selected></option>
                                        <option {{ old('siblingyearorwork.'.$id) == 'ELEMENTARY' ? 'selected' : '' }} value="ELEMENTARY">ELEMENTARY</option>
                                        <option {{ old('siblingyearorwork.'.$id) == 'HIGH SCHOOL' ? 'selected' : '' }} value="{{ "HIGH SCHOOL" }}">HIGH SCHOOL</option>
                                        <option {{ old('siblingyearorwork.'.$id) == 'COLLEGE' ? 'selected' : '' }} value="COLLEGE">COLLEGE</option>
                                        <option {{ old('siblingyearorwork.'.$id) == 'WORKING' ? 'selected' : '' }} value="WORKING">WORKING</option>
                                    </select>
                                    <x-input-error :messages="$errors->get('siblingyearorwork.'.$id)" class="mt-2" />
                                </div>
                            </div>
                        @endforeach

                        <div class="grid grid-cols-2 gap-6 my-6">
                            <div>
                                <x-input-label for="siblingsnumberofworking" :value="__('Bilang ng (mga) kapatid na nagtatrabaho')" class="uppercase"/>
                                <x-text-input id="siblingsnumberofworking" class="block mt-1 w-full uppercase" type="number" name="siblingsnumberofworking" value="{{ old('siblingsnumberofworking', $applicant->siblingsnumberofworking) }}" />
                                <x-input-error :messages="$errors->get('siblingsnumberofworking')" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="siblingstotalincome" :value="__('Kabuuang Buwang Kita')" class="uppercase"/>
                                <x-text-input id="siblingstotalincome" class="block mt-1 w-full" type="number" name="siblingstotalincome" value="{{ old('siblingstotalincome', intval($applicant->siblingstotalincome)) }}" />
                                <x-input-error :messages="$errors->get('siblingstotalincome')" class="mt-2" />
                            </div>
                        </div>

                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            MIYEMBRO KA BA NG KAHIT NA ANONG MINISTRY NG PAROKYA?
                        </h6>
                        <div class="grid grid-cols-2 gap-6 my-6">
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
                        <div class="grid grid-cols-2 gap-6 my-6">
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
                        <div class="grid grid-cols-4 gap-6 my-6">
                            <div>
                                <x-input-label for="relativename-{{ $id }}" value="Pangalan" class="uppercase"/>
                                <x-text-input id="relativename-{{ $id }}" class="block mt-1 w-full uppercase" type="text" name="relativename[]" value="{{ old('relativename.'.$id) }}" autocomplete=""/>
                                <x-input-error :messages="$errors->get('relativename.'.$id)" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="relativeage-{{ $id }}" :value="__('Edad')" class="uppercase"/>
                                <x-text-input id="relativeage-{{ $id }}" class="block mt-1 w-full" type="number" name="relativeage[]" value="{{ old('relativeage.'.$id) }}" autocomplete=""/>
                                <x-input-error :messages="$errors->get('relativeage.'.$id)" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="relativerelation-{{ $id }}" :value="__('Relasyon')" class="uppercase"/>
                                <x-text-input id="relativerelation-{{ $id }}" class="block mt-1 w-full uppercase" type="text" name="relativerelation[]" value="{{ old('relativerelation.'.$id) }}" autocomplete=""/>
                                <x-input-error :messages="$errors->get('relativerelation.'.$id)" class="mt-2" />
                            </div>
                            <div>
                                <x-input-label for="relativework-{{ $id }}" :value="__('Trabaho')" class="uppercase"/>
                                <x-text-input id="relativework-{{ $id }}" class="block mt-1 w-full uppercase" type="text" name="relativework[]" value="{{ old('relativework.'.$id) }}" autocomplete=""/>
                                <x-input-error :messages="$errors->get('relativework.'.$id)" class="mt-2" />
                            </div>
                        </div>
                        @endforeach
                    
                        <hr class="my-4 h-px bg-gray-200 border-0 dark:bg-gray-700">
                        <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                            Requirements (Clear Copy)
                        </h6>
                        <div class="mb-4">
                            <!-- Upload Applicant Picture -->
                            <x-input-label class="my-2 uppercase " for="file_input_picture" id="file_input_picture_label" value="2x2 Picture"/>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 " aria-describedby="file_input_help" id="file_input_picture" name="file_input_picture" type="file">
                            <x-input-error :messages="$errors->get('file_input_picture')" class="mt-2 mb-5" />
                        </div>
                        
                        <div class="mb-4">
                            <!-- Upload Baptismal Cert -->
                            <x-input-label class="my-2 uppercase " for="file_input_baptismal" id="file_input_baptismal_label" value="Baptismal Certificate"/>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 " aria-describedby="file_input_help" id="file_input_baptismal" name="file_input_baptismal" type="file">
                            <x-input-error :messages="$errors->get('file_input_baptismal')" class="mt-2 mb-5" />
                        </div>
                        
                        <div class="mb-4">
                            <!-- Upload Birth Cert -->
                            <x-input-label class="my-2 uppercase " for="file_input_birth" id="file_input_birth_label" value="Birth Certificate"/>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 " aria-describedby="file_input_help" id="file_input_birth" name="file_input_birth" type="file">
                            <x-input-error :messages="$errors->get('file_input_birth')" class="mt-2 mb-5" />
                        </div>
                            
                        <div class="mb-4">
                            <!-- Upload Registration Form/Report Card -->
                            <x-input-label class="my-2 uppercase " for="file_input_regi_report" id="file_input_regi_report_label" value="Report Card/Registration Form"/>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 " aria-describedby="file_input_help" id="file_input_regi_report" name="file_input_regi_report" type="file">
                            <x-input-error :messages="$errors->get('file_input_regi_report')" class="mt-2 mb-5" />
                        </div>

                        <div class="mb-4">
                            <!-- Upload Registration Form -->
                            <x-input-label class="my-2 uppercase " for="file_input_regi" id="file_input_regi_label" value="Registration Form"/>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400  " aria-describedby="file_input_help" id="file_input_regi" name="file_input_regi" type="file">
                            <x-input-error :messages="$errors->get('file_input_regi')" class="mt-2 mb-5" />
                        </div>

                        <div class="mb-4">
                            <!-- Upload Report Card -->
                            <x-input-label class="my-2 uppercase " for="file_input_report" id="file_input_report_label" value="Report Card"/>
                            <input class="block w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 cursor-pointer dark:text-gray-400 focus:outline-none dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 " aria-describedby="file_input_help" id="file_input_report" name="file_input_report" type="file">
                            <x-input-error :messages="$errors->get('file_input_report')" class="mt-2 mb-5" />
                        </div>

                        <div class="flex p-4 mt-4 mb-4 text-sm text-blue-700 bg-blue-100 rounded-lg dark:bg-blue-200 dark:text-blue-800" role="alert">
                            <svg aria-hidden="true" class="flex-shrink-0 inline w-5 h-5 mr-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7-4a1 1 0 11-2 0 1 1 0 012 0zM9 9a1 1 0 000 2v3a1 1 0 001 1h1a1 1 0 100-2v-3a1 1 0 00-1-1H9z" clip-rule="evenodd"></path></svg>
                            <span class="sr-only">Info</span>
                            <div>Only UPLOAD DOCUMENTS in JPG or PNG Format! (Max. 8MB)</div>
                        </div>
                        
                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="button" data-modal-toggle="popup-modal" class="ml-3">
                                {{ __('Submit') }}
                            </x-primary-button>

                            <div id="popup-modal" data-modal-backdrop="static" tabindex="-1" class="hidden overflow-y-auto overflow-x-hidden fixed top-0 right-0 left-0 z-50 p-4 md:inset-0 h-modal md:h-full">
                                <div class="relative w-full max-w-md h-full md:h-auto">
                                    <div class="relative bg-white rounded-lg shadow dark:bg-gray-700">
                                        <button type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="popup-modal">
                                            <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                                                <path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path>
                                            </svg>
                                            <span class="sr-only">Close modal</span>
                                        </button>
                                        <div class="p-6 text-center">
                                            <svg aria-hidden="true" class="mx-auto mb-4 w-14 h-14 text-gray-400 dark:text-gray-200" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path>
                                            </svg>
                                            <h3 class="mb-5 text-lg font-normal text-gray-500 dark:text-gray-400">Are you sure you want to finalize your submission?</h3>
                                            <button data-modal-toggle="popup-modal" type="submit" class="text-white bg-blue-600 hover:bg-blue-800 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:focus:ring-blue-800 font-medium rounded-lg text-sm inline-flex items-center px-5 py-2.5 text-center mr-2">
                                                Yes, I'm sure
                                            </button>
                                            <button data-modal-toggle="popup-modal" type="button" class="text-gray-500 bg-white hover:bg-gray-100 focus:ring-4 focus:outline-none focus:ring-gray-200 rounded-lg border border-gray-200 text-sm font-medium px-5 py-2.5 hover:text-gray-900 focus:z-10 dark:bg-gray-700 dark:text-gray-300 dark:border-gray-500 dark:hover:text-white dark:hover:bg-gray-600 dark:focus:ring-gray-600">No, cancel</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>