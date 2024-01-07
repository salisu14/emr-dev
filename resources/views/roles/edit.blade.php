<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Role') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2 text-gray-900 dark:text-gray-100">
                    <div class="block overflow-x-auto shadow-md sm:rounded-lg">
                        <form method="POST" action="{{ route('roles.update', $role) }}">
                            @csrf
                            @method('PUT')

                            <!-- Name -->
                            <div>
                                <x-label for="name" :value="__('Name')"/>
                                <x-input type="text"
                                        name="name"
                                        id="name"
                                        value="{{ $role->name }}"
                                        required
                                        autofocus
                                        readonly
                                />
                            </div>

                            <div class="mt-3">
                                <label for="permissions" class="block font-medium text-sm text-gray-700">Permissions</label>
                                <select name="permissions[]" id="permissions" size="10" class="form-multiselect rounded-md shadow-sm mt-1 block w-full" multiple="multiple">
                                    @foreach($permissions as $id => $permission)
                                        <option value="{{ $id }}" {{ in_array($id, $role->permissions->pluck('id')->toArray()) ? ' selected' : '' }}>
                                            {{ $permission }}
                                        </option>
                                    @endforeach
                                </select>
                                @error('permissions')
                                    <p class="text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div class="flex flex-col items-end mt-4">
                                <x-button class="w-full">
                                    {{ __('Submit') }}
                                </x-button>
                            </div>
                            
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>