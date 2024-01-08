<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Create Appointment') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
					<form method="POST" action="{{ route('appointments.store') }}">
						@csrf

						<!-- Scheduled Date and Time -->
						<div class="mb-4">
							<x-label for="scheduled_at" :value="__('Scheduled Date and Time')"/>
							<x-input type="datetime-local"
								name="scheduled_at"
								id="scheduled_at"
								value="{{ old('scheduled_at') }}"
								required
								autofocus
							/>
						</div>

						<!-- Reason for Visit -->
						<div class="mb-4">
							<x-label for="reason" :value="__('Reason for Visit')"/>
							<x-input type="text"
								name="reason"
								id="reason"
								value="{{ old('reason') }}"
								required
							/>
						</div>

						<!-- Appointment Status -->
						<div class="mb-4">
							<x-label for="status" :value="__('Appointment Status')"/>
							<select id="status" name="status" class="block w-full mt-1">
								@foreach(\App\Enums\AppointmentStatus::cases() as $status)
									<option value="{{ $status->value }}" {{ old('status') == $status ? 'selected' : '' }}>
										{{ \App\Enums\AppointmentStatus::getLabel($status) }}
									</option>
								@endforeach
							</select>
						</div>

						<!-- Patient ID (Assuming you have a patients table and a patient model) -->
						<div class="mb-4">
                            <label for="patient_id" class="block text-sm font-medium text-gray-600">Patient</label>
                            <select name="patient_id" id="patient_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($patients as $patient)
                                    <option value="{{ $patient->id }}">{{ $patient->full_name }}</option>
                                @endforeach
                            </select>
                        </div>

						<!-- Physician/Provider ID (Assuming you have a providers table and a provider model) -->
						<div class="mb-4">
                            <label for="physician_id" class="block text-sm font-medium text-gray-600">Provider</label>
                            <select name="physician_id" id="physician_id" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50">
                                @foreach ($physicians as $physician)
                                    <option value="{{ $physician->id }}">{{ $physician->full_name }}</option>
                                @endforeach
                            </select>
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
