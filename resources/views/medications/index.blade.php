<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Visits') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                        
                    <div class="relative overflow-x-auto  sm:rounded-lg">
                    
                        <x-flash />

                        <table class="min-w-full leading-normal">
                            <thead>
                                <tr>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        S/N
                                    </th>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Name
                                    </th>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Dosage
                                    </th>
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        Frequency
                                    </th>
                                    
                                    <th class="px-5 py-3 text-xs font-semibold tracking-wider text-left text-gray-600 uppercase bg-gray-100 border-b-2 border-gray-200">
                                        <div class="flex justify-center items-center">
                                            Actions
                                        </div>
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($medications as $medication)
                                <tr>
                                    <td class="px-5 py-3 text-base bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ ($medications->currentPage() - 1) * $medications->perPage() + $loop->iteration }}.</p>
                                    </td>
                                    <td class="px-5 py-3 text-base bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $medication->name }}</p>
                                    </td>
                                    <td class="px-5 py-3 text-base bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $medication->dosage }}</p>
                                    </td>
                                    <td class="px-5 py-3 text-base bg-white border-b border-gray-200">
                                        <p class="text-gray-900 whitespace-no-wrap">{{ $medication->frequency }}</p>
                                    </td>
                                    <td class="px-5 py-3 text-base bg-white border-b border-gray-200">
                                        <div class="flex justify-center items-center">
                                            <a class="mr-2" href="{{ route('medications.show', $medication) }}">
                                                <svg class="w-5 h-5 inline" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M10 12a2 2 0 100-4 2 2 0 000 4z" />
                                                    <path fill-rule="evenodd" d="M.458 10C1.732 5.943 5.522 3 10 3s8.268 2.943 9.542 7c-1.274 4.057-5.064 7-9.542 7S1.732 14.057.458 10zM14 10a4 4 0 11-8 0 4 4 0 018 0z" clip-rule="evenodd" />
                                                </svg>
                                            </a>
                                            <a href="{{ route('medications.edit', $medication) }}">
                                                <svg class="w-5 h-5 inline mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20" fill="currentColor">
                                                    <path d="M13.586 3.586a2 2 0 112.828 2.828l-.793.793-2.828-2.828.793-.793zM11.379 5.793L3 14.172V17h2.828l8.38-8.379-2.83-2.828z" />
                                                </svg>
                                            </a>
                                            <div class="mr-4">
                                                <form class="inline" method="POST" action="{{ route('medications.destroy', $medication) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button onclick="return confirm('Are you sure you want delete this medication?')" type="submit">
                                                        <svg class="w-5 h-5 inline text-red-700" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor">
                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M14.74 9l-.346 9m-4.788 0L9.26 9m9.968-3.21c.342.052.682.107 1.022.166m-1.022-.165L18.16 19.673a2.25 2.25 0 01-2.244 2.077H8.084a2.25 2.25 0 01-2.244-2.077L4.772 5.79m14.456 0a48.108 48.108 0 00-3.478-.397m-12 .562c.34-.059.68-.114 1.022-.165m0 0a48.11 48.11 0 013.478-.397m7.5 0v-.916c0-1.18-.91-2.164-2.09-2.201a51.964 51.964 0 00-3.32 0c-1.18.037-2.09 1.022-2.09 2.201v.916m7.5 0a48.667 48.667 0 00-7.5 0" />
                                                        </svg>
                                                    <button>
                                                </form>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                        <div class="flex flex-col items-center px-5 py-5 bg-white border-t xs:flex-row xs:justify-between">
                            {{ $medications->links() }}
                        </div>

                        <div class="flex justify-end m-2">
                            
                            <x-primary-link :href="route('medications.create')">
                                <svg class="w-5 h-5 inline mr-2" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M12 4v16m8-8H4" />
                            </svg>Add New
                            </x-primary-link>
                        </div>

                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>