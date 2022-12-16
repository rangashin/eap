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
                                <x-input-label for="subadminfullname" :value="__('Full Name')" />
                                <x-text-input id="subadminfullname" name="subadminfullname" type="text" class="mt-1 block w-full uppercase" value="{{ old('subadminfullname', $user->adminfullname) }}" autofocus autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('subadminfullname')" />
                            </div>

                            <div>
                                <x-input-label for="subadminaddress" :value="__('Address')" />
                                <x-text-input id="subadminaddress" name="subadminaddress" type="text" class="mt-1 block w-full uppercase" value="{{ old('subadminaddress', $user->adminaddress) }}" autocomplete="address" />
                                <x-input-error class="mt-2" :messages="$errors->get('subadminaddress')" />
                            </div>

                            <div>
                                <x-input-label for="subadminbirthdate" :value="__('Birthdate (year-month-day)')" />
                                <x-text-input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" id="subadminbirthdate" name="subadminbirthdate" type="text" class="mt-1 block w-full" value="{{ old('subadminbirthdate', $user->adminbirthdate) }}" autocomplete="birthdate" />
                                <x-input-error class="mt-2" :messages="$errors->get('subadminbirthdate')" />
                            </div>

                            <div>
                                <x-input-label for="" :value="__('Admin Type')" />
                                <x-text-input id="" name="" type="text" class="mt-1 block w-full bg-slate-200 uppercase" value="{{ auth()->user()->role->roletype }}" disabled/>
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