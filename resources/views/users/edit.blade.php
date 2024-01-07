<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit User') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="relative overflow-x-auto shadow-md sm:rounded-lg p-6">
                        <form method="post" action="{{ route('users.update', $user) }}">
                            @csrf
                            @method('put')
                            
                            <div class="shadow overflow-hidden sm:rounded-md">
                                <div class="px-3 py-2 bg-white sm:p-6">
                                    <label for="name" class="block font-medium text-sm text-gray-700">Name</label>
                                    <input type="text" name="name" id="name" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('name', $user->name) }}" />
                                    @error('name')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="px-3 py-2 bg-white sm:p-6">
                                    <label for="email" class="block font-medium text-sm text-gray-700">Email</label>
                                    <input type="email" name="email" id="email" class="form-input rounded-md shadow-sm mt-1 block w-full"
                                        value="{{ old('email', $user->email) }}" />
                                    @error('email')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <div class="px-3 py-2 bg-white sm:p-6">
                                    <label for="password" class="block font-medium text-sm text-gray-700">Password</label>
                                    <input type="password" name="password" id="password" class="form-input rounded-md shadow-sm mt-1 block w-full" />
                                    @error('password')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>

                                <!-- Confirm Password -->
                                <div class="px-3 py-2 bg-white sm:p-6">
                                    <x-label for="password_confirmation" :value="__('Confirm Password')"/>
                                    <x-input type="password"
                                            name="password_confirmation"
                                            id="password_confirmation"
                                    />
                                </div>

                                <!-- Phone Number -->
                                <div class="px-3 py-2 bg-white sm:p-6">
                                    <x-label for="phone_number" :value="__('Phone Number')"/>
                                    <x-input type="text"
                                            name="phone_number"
                                            id="phone_number"
                                            value="{{ $user->phone_number }}"
                                            required />
                                    @error('phone_number')
                                        <p class="text-sm text-red-600">{{ $user->phone_number }}</p>
                                    @enderror
                                </div>

                                <div class="px-3 py-2 bg-white sm:p-6">
                                    <label for="roles" class="block font-medium text-sm text-gray-700">Roles</label>
                                    <select name="roles[]" id="roles" class="form-multiselect rounded-md shadow-sm mt-1 block w-full" multiple="multiple">
                                        @foreach($roles as $id => $role)
                                            <option value="{{ $id }}" {{ in_array($id, old('roles', $user->roles->pluck('id')->toArray())) ? ' selected' : '' }}>
                                                {{ $role }}
                                            </option>
                                        @endforeach
                                    </select>
                                    @error('roles')
                                        <p class="text-sm text-red-600">{{ $message }}</p>
                                    @enderror
                                </div>
                                
                                <div class="flex flex-col items-end mt-4">
                                    <x-button class="w-full inline-flex justify-center items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:shadow-outline-gray disabled:opacity-25 transition ease-in-out duration-150">
                                        {{ __('Submit') }}
                                    </x-button>
                                </div>
                                
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>