<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ $user->username.'\'s Information' }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <section>
                        <header>
                            <x-nav-link :href="route('admin.user.index')" class="items-center">
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6"><path stroke-linecap="round" stroke-linejoin="round" d="M9 15L3 9m0 0l6-6M3 9h12a6 6 0 010 12h-3" /></svg>
                                <div class="px-3">{{ __('Go Back') }}</div>
                            </x-nav-link>
                    
                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Account Information
                            </h6>
                        </header>

                        <div class="my-5">
                            <x-input-label for="username" class="uppercase my-1" :value="__('Username')" />
                            <p class="font-black text-xl text-gray-700">{{ $user->username }}</p>
                        </div>
                
                        <div class="my-5">
                            <x-input-label for="contactno" class="uppercase my-1" :value="__('Contact Number')" />
                            <p class="font-black text-xl text-gray-700">{{ $user->contactno }}</p>
                        </div>
                
                        <div class="my-5">
                            <x-input-label for="email" class="uppercase my-1" :value="__('Email')" />
                            <p class="font-black text-xl text-gray-700">{{ $user->email }}</p>
                        </div>                                                          
                
                        <div class="my-5">
                            <x-input-label for="role_id" class="uppercase my-1" :value="__('Role')" />
                            <p class="font-black text-xl text-gray-700">{{ $user->role->roletype }}</p>
                        </div>


                        @if (in_array($user->role_id, [2, 3, 5, 6, 7]))
                            <hr class="my-6 h-px bg-gray-200 border-0 dark:bg-gray-700"> 
                            <h6 class="text-blueGray-400 text-sm mt-3 mb-6 font-bold uppercase">
                                Profile Information
                            </h6>
                            
                            @if (in_array($user->role_id, [2, 3]))

                                @if (empty($user->userProfile->fullname))
                                    <div class="my-5">
                                        <p class="font-black text-xl text-gray-700">{{ 'Not yet filled up.' }}</p>
                                    </div>
                                @else
                                    <div class="my-5">
                                        <x-input-label for="fullname" class="uppercase my-1" :value="__('Full Name')" />
                                        <p class="font-black text-xl text-gray-700">{{ $user->userProfile->fullname }}</p>
                                    </div>
            
                                    <div class="my-5">
                                        <x-input-label for="address" class="uppercase my-1" :value="__('Address')" />
                                        <p class="font-black text-xl text-gray-700">{{ $user->userProfile->address }}</p>
                                    </div>

                                    <div class="my-5">
                                        <x-input-label for="birthdate" class="uppercase my-1" :value="__('Birthdate')" />
                                        <p class="font-black text-xl text-gray-700">{{ $user->userProfile->birthdate }}</p>
                                    </div>

                                    <div class="my-5">
                                        <x-input-label for="acctype" class="uppercase my-1" :value="__('Account Type')" />
                                        <p class="font-black text-xl text-gray-700">{{ $user->userProfile->acctype }}</p>
                                    </div>
                                @endif
                            @else
                                {{-- @if (empty($user->adminProfile())) --}}
                                @if (empty($user->adminProfile->adminfullname))
                                    <div class="my-5">
                                        <p class="font-black text-xl text-gray-700">{{ 'Not yet filled up.' }}</p>
                                    </div>
                                @else
                                    <div class="my-5">
                                        <x-input-label for="adminfullname" class="uppercase my-1" :value="__('Full Name')" />
                                        <p class="font-black text-xl text-gray-700">{{ $user->adminProfile->adminfullname }}</p>
                                    </div>

                                    <div class="my-5">
                                        <x-input-label for="adminaddress" class="uppercase my-1" :value="__('Address')" />
                                        <p class="font-black text-xl text-gray-700">{{ $user->adminProfile->adminaddress }}</p>
                                    </div>

                                    <div class="my-5">
                                        <x-input-label for="adminbirthdate" class="uppercase my-1" :value="__('Birthdate')" />
                                        <p class="font-black text-xl text-gray-700">{{ $user->adminProfile->adminbirthdate }}</p>
                                    </div>
                                    
                                    @if ($user->role_id == 5)
                                        <div class="my-5">
                                            <x-input-label for="sex" class="uppercase my-1" :value="__('Sex')" />
                                            <p class="font-black text-xl text-gray-700">{{ $user->adminProfile->sex }}</p>
                                        </div>

                                        <div class="my-5">
                                            <x-input-label for="kawan_id" class="uppercase my-1" :value="__('Kawan')" />
                                            <p class="font-black text-xl text-gray-700">{{ $user->adminProfile->kawan->kawanname }}</p>
                                        </div>
                                    @endif
                                @endif    
                            @endif
                        @endif
                    </section>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>