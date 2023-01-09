<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <x-success-message/>
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <h2 class="text-lg font-medium text-gray-900">
                                {{ __('Profile Information') }}
                            </h2>
                    
                            <p class="mt-1 text-sm text-gray-600">
                                {{ __("Update your account's profile information.") }}
                            </p>
                        </header>

                        <form action="{{ route('account.update') }}" method="post" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <div>
                                <x-input-label for="kawan_id" :value="__('Kawan')" class="uppercase"/>
                                <select class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm uppercase" name="kawan_id" id="kawan_id" autofocus>
                                    <option {{ old('kawan_id', $user->kawan_id) == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('kawan_id', $user->kawan_id) == 'AH' ? 'selected' : '' }} value="AH">Ayala Hillside</option>
                                    <option {{ old('kawan_id', $user->kawan_id) == 'AV' ? 'selected' : '' }} value="AV">Alpha Village</option>
                                    <option {{ old('kawan_id', $user->kawan_id) == 'C' ? 'selected' : '' }} value="C">Centro</option>
                                    <option {{ old('kawan_id', $user->kawan_id) == 'CG' ? 'selected' : '' }} value="CG">CH Golf</option>
                                    <option {{ old('kawan_id', $user->kawan_id) == 'DM' ? 'selected' : '' }} value="DM">Divine Mercy</option>
                                    <option {{ old('kawan_id', $user->kawan_id) == 'OLL-S' ? 'selected' : '' }} value="OLL-S">Our Lady of Lourdes - Sofia</option>
                                    <option {{ old('kawan_id', $user->kawan_id) == 'SG' ? 'selected' : '' }} value="SG">Sitio Gabihan</option>
                                    <option {{ old('kawan_id', $user->kawan_id) == 'SK' ? 'selected' : '' }} value="SK">Sapang Kangkong</option>
                                    <option {{ old('kawan_id', $user->kawan_id) == 'SN' ? 'selected' : '' }} value="SN">Sto. Nino</option>
                                    <option {{ old('kawan_id', $user->kawan_id) == 'SP' ? 'selected' : '' }} value="SP">Sitio Payong</option>
                                    <option {{ old('kawan_id', $user->kawan_id) == 'STCJ-H' ? 'selected' : '' }} value="STCJ-H">St. Therese of the Child Jesus - Hobart</option>
                                    <option {{ old('kawan_id', $user->kawan_id) == 'VH' ? 'selected' : '' }} value="VH">Visayan Hills</option>
                                </select>
                                <x-input-error :messages="$errors->get('kawan_id')" class="mt-2" class="uppercase"/>
                            </div>

                            <div>
                                <x-input-label for="leaderfullname" :value="__('Full Name')" class="uppercase"/>
                                <x-text-input id="leaderfullname" name="leaderfullname" type="text" class="mt-1 block w-full uppercase" value="{{ old('leaderfullname', $user->adminfullname) }}" autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('leaderfullname')" />
                            </div>

                            <div>
                                <x-input-label for="leaderaddress" :value="__('Address')" class="uppercase"/>
                                <x-text-input id="leaderaddress" name="leaderaddress" type="text" class="mt-1 block w-full uppercase" value="{{ old('leaderaddress', $user->adminaddress) }}" autocomplete="address" />
                                <x-input-error class="mt-2" :messages="$errors->get('leaderaddress')" />
                            </div>

                            <div>
                                <x-input-label for="leaderbirthdate" :value="__('Birthdate (year-month-day)')" class="uppercase"/>
                                <x-text-input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" id="leaderbirthdate" name="leaderbirthdate" type="text" class="mt-1 block w-full" value="{{ old('leaderbirthdate', $user->adminbirthdate) }}" autocomplete="birthdate" />
                                <x-input-error class="mt-2" :messages="$errors->get('leaderbirthdate')" />
                            </div>

                            <div>
                                <x-input-label for="leadersex" :value="__('Sex')" class="uppercase"/>
                                <select class="rmt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" name="leadersex" id="leadersex">
                                    <option {{ old('leadersex', $user->sex) == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('leadersex', $user->sex) == 'MALE' ? 'selected' : '' }} value="MALE">MALE</option>
                                    <option {{ old('leadersex', $user->sex) == 'FEMALE' ? 'selected' : '' }} value="FEMALE">FEMALE</option>
                                </select>
                                <x-input-error :messages="$errors->get('leadersex')" class="mt-2" />
                            </div>

                            <div class="flex items-center gap-4">
                                <x-primary-button>{{ __('Save') }}</x-primary-button>       
                            </div>
                        </form>
                    </section>
                </div>
            </div>
        </div>
    </div>



</x-app-layout>