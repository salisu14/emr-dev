<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Prescription') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <!-- Prescription Form -->
                    <form action="{{ route('prescriptions.update', $prescription) }}" method="POST" class="max-w-md">
                        @csrf
                        @method('PUT')

                        <div class="mb-4">
                            <label for="patient_id" class="block text-sm font-medium text-gray-600">Patient</label>
                            <select name="patient_id" id="patient_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}"  {{ $patient->patient_id == $prescription->patient_id ? 'selected' : '' }}>{{ $patient->full_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="medication_id" class="block text-sm font-medium text-gray-600">Medication</label>
                            <select name="medication_id" id="medication_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($medications as $medication)
                                     <option value="{{ $medication->id }}" {{ $medication->id == $prescription->medication_id ? 'selected' : '' }}>{{ $medication->name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="physician_id" class="block text-sm font-medium text-gray-600">Provider</label>
                            <select name="physician_id" id="physician_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($physicians as $physician)
                                    <option value="{{ $physician->id }}"  {{ $physician->id == $prescription->physician_id ? 'selected' : '' }}>{{ $physician->full_name }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="date_prescribed" class="block text-sm font-medium text-gray-600">Date Prescribed</label>
                            <input type="date" name="date_prescribed" id="date_prescribed" value="{{ $prescription->date_prescribed }}" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="quantity" class="block text-sm font-medium text-gray-600">Quantity</label>
                            <input type="number" name="quantity" id="quantity" value="{{ $prescription->quantity }}" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                        </div>

                        <div class="mb-4">
                            <label for="refills" class="block text-sm font-medium text-gray-600">Refills</label>
                            <input type="number" name="refills" id="refills" value="{{ $prescription->refills }}" class="mt-1 p-2 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
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
