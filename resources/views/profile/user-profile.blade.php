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
                                <x-input-label for="fullname" :value="__('Full Name')" />
                                <x-text-input id="fullname" name="fullname" type="text" class="mt-1 block w-full uppercase" value="{{ old('fullname', $user->fullname) }}" autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('fullname')" />
                            </div>

                            <div>
                                <x-input-label for="address" :value="__('Address')" />
                                <x-text-input id="address" name="address" type="text" class="mt-1 block w-full uppercase" value="{{ old('address', $user->address) }}" autocomplete="address" />
                                <x-input-error class="mt-2" :messages="$errors->get('address')" />
                            </div>

                            <div>
                                <x-input-label for="birthdate" :value="__('Birthdate (year-month-day)')" />
                                <x-text-input datepicker datepicker-autohide datepicker-format="yyyy-mm-dd" id="birthdate" name="birthdate" type="text" class="mt-1 block w-full" value="{{ old('birthdate', $user->birthdate) }}" autocomplete="birthdate" />
                                <x-input-error class="mt-2" :messages="$errors->get('birthdate')" />
                            </div>

                            <div>
                                <x-input-label for="acctype" :value="__('Account Type')" />
                                <select id="acctype" name="acctype" class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm">
                                    <option {{ old('acctype', $user->acctype)  == '' ? 'selected' : '' }} value="" disabled selected hidden></option>
                                    <option {{ old('acctype', $user->acctype) == 'STUDENT' ? 'selected' : '' }} value="STUDENT">STUDENT</option>
                                    <option {{ old('acctype', $user->acctype) == 'PARENT' ? 'selected' : '' }} value="PARENT">PARENT</option>
                                </select>
                                <x-input-error class="mt-2" :messages="$errors->get('acctype')" />
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