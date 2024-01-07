<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    <div class="py-6">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="px-6 py-2 text-gray-900 dark:text-gray-100">
                    <div class="block overflow-x-auto shadow-md sm:rounded-lg">
                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-2 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        S/N
                                    </th>

                                    <th class="px-5 py-2 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Name
                                    </th>
                                    
                                    <th class="px-5 py-2 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Action
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($roles as $role)
                                <tr>
                                    <td class="px-5 py-2 text-sm bg-white border-b border-gray-200">
                                        {{ $loop->iteration }}
                                    </td>
                                    <td class="px-5 py-2 text-sm bg-white border-b border-gray-200">
                                        {{ Str::ucfirst($role->name) }}
                                    </td>
                                    <td class="px-5 py-2 text-sm bg-white border-b border-gray-200 flex">
                                        
                                        <x-anchor-link href="{{ route('roles.edit', $role) }}" class="inline mr-1">Edit</x-anchor-link>

                                        @can('role_delete')
                                        <form method="post" action="{{ route('roles.destroy', $role) }}" class="inline">
                                            @csrf
                                            @method('delete')

                                            <div class="ml-2 inline">
                                                <x-input-label for="password" value="{{ __('Password') }}" class="sr-only" />

                                                <x-danger-button class="ml-3">
                                                    {{ __('Delete') }}
                                                </x-danger-button>
                                            </div>
                                        </form>
                                        @endcan
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
                            {{ $roles->links() }}
                        </div>

                        <div class="flex justify-end m-2">
                            
                            <x-anchor-link :href="route('roles.create')">
                                <svg class="w-5 h-5 inline mr-1" xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                                </svg> Add New
                            </x-anchor-link>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>