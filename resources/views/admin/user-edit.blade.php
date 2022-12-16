<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ 'Edit '.$user->username.'\'s Information' }}
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

                        <form action="{{ route('admin.user.update', $user->id) }}" method="post" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <div>
                                <x-input-label for="username" class="uppercase" :value="__('Username')" />
                                <x-text-input id="username" name="username" type="text" class="mt-1 block w-full" :value="old('username', $user->username)"  autocomplete="name" />
                                <x-input-error class="mt-2" :messages="$errors->get('username')" />
                            </div>
                    
                            <div>
                                <x-input-label for="contactno" class="uppercase" :value="__('Contact Number')" />
                                <x-text-input id="contactno" name="contactno" type="text" class="mt-1 block w-full" :value="old('contactno', $user->contactno)"  autocomplete="contactno" />
                                <x-input-error class="mt-2" :messages="$errors->get('contactno')" />
                            </div>
                    
                            <div>
                                <x-input-label for="email" class="uppercase" :value="__('Email')" />
                                <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)"  autocomplete="email" />
                                <x-input-error class="mt-2" :messages="$errors->get('email')" />
                            </div>                                                          
                    
                            <div>
                                <x-input-label for="password" class="uppercase" :value="__('New Password')" />
                                <x-text-input id="password" name="password" type="password" class="mt-1 block w-full"/>
                                <x-input-error class="mt-2" :messages="$errors->get('password')" />
                            </div>

                            <div>
                                <x-input-label for="role_id" class="uppercase" :value="__('Role')" />
                                <x-text-input type="text" class="mt-1 block w-full bg-slate-200" value="{{ $user->role->roletype }}" disabled/>
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