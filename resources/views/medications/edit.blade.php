<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Medication') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
					<form method="POST" action="{{ route('medications.update', $medication) }}">
						@csrf
						@method('PUT')

						<!-- Name -->
						<div class="mb-4">
							<x-label for="name" :value="__('Name')"/>
							<x-input type="text"
								name="name"
								id="name"
								value="{{ $medication->name }}"
								required
								autofocus
							/>
						</div>

						<!-- Description -->
						<div class="mb-4">
							<label for="description" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Description</label>
							<textarea id="description" name="description" rows="3" class="block p-2.5 w-full text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">{{ $medication->description }}</textarea>
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
</x-app-layout>