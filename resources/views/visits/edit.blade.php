<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Visit') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="POST" action="{{ route('visits.store') }}">
                        @csrf

                          <!-- Date -->
                          <div>
                            <x-input-label for="date" :value="__('Date')" />
                            <x-text-input id="name" class="block mt-1 w-full" type="date" name="date"/>
                            <x-input-error :messages="$errors->get('date')" class="mt-2" />
                        </div>

                        <!-- Complaint -->
                        <div class="mt-4">
                            <x-input-label for="complaint" :value="__('Complaint')" />
                            <x-text-input id="complaint" class="block mt-1 w-full" type="text" name="complaint"/>
                            <x-input-error :messages="$errors->get('complaint')" class="mt-2" />
                        </div>

                        <!-- Treatment-->
                        <div class="mt-4">
                            <x-input-label for="treatment" :value="__('Treatment')" />
                            <x-text-input id="treatment" class="block mt-1 w-full" type="text" name="treatment"/>
                            <x-input-error :messages="$errors->get('treatment')" class="mt-2" />
                        </div>

                        <!-- Prescription-->
                        <div class="mt-4">
                            <x-input-label for="prescription" :value="__('Prescription')" />
                            <x-text-input id="prescription" class="block mt-1 w-full" type="text" name="prescription"/>
                            <x-input-error :messages="$errors->get('prescription')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            <x-primary-button type="submit" class="ml-4">
                                {{ __('Submit') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
