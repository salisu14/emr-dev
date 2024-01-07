<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Users') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
                        <form method="POST" action="{{ route('users.store') }}">
                            @csrf

                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')"/>
                                <x-input type="text"
                                        name="name"
                                        id="name"
                                        value="{{ old('name') }}"
                                        required
                                        autofocus
                                />
                            </div>

                            <!-- Email Address -->
                            <div class="mt-4">
                                <x-label for="email" :value="__('Email')"/>
                                <x-input type="email"
                                        name="email"
                                        id="email"
                                        value="{{ old('email') }}"
                                        required/>
                            </div>

                            <!-- Password -->
                            <div class="mt-4">
                                <x-label for="password" :value="__('Password')"/>
                                <x-input type="password"
                                        name="password"
                                        id="password"
                                        required
                                        autocomplete="off"
                                />
                            </div>

                            <!-- Confirm Password -->
                            <div class="mt-4">
                                <x-label for="password_confirmation" :value="__('Confirm Password')"/>
                                <x-input type="password"
                                        name="password_confirmation"
                                        id="password_confirmation"
                                        autocomplete="off"
                                        required
                                />
                            </div>

                            <!-- Phone Number -->
                            <div class="mt-4">
                                <x-label for="phone_number" :value="__('Phone Number')"/>
                                <x-input type="text"
                                        name="phone_number"
                                        id="phone_number"
                                        value="{{ old('phone_number') }}"
                                        required/>
                            </div>

                            <!-- Roles -->
                            <div class="mt-4">
                                <label for="roles" class="block font-medium text-sm text-gray-700">Roles</label>
                                <select name="roles[]" id="roles" class="form-multiselect rounded-md shadow-sm mt-1 block w-full">
                                    @foreach($roles as $roleId => $roleName)
                                        <option value="{{ $roleId }}" {{ in_array($roleId, old('roles', [])) ? ' selected' : '' }}>{{ $roleName }}</option>
                                    @endforeach
                                </select>
                                @error('roles')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            <div class="flex mt-4">
                                <x-button class="w-full">
                                    {{ __('Create') }}
                                </x-button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>