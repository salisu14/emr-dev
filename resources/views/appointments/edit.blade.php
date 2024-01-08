<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Edit Appointment') }}
        </h2>
    </x-slot>

    <div class="py-4">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
					<form method="POST" action="{{ route('appointments.update', $appointment) }}">
						@csrf
						@method('PUT')

						<!-- Scheduled Date and Time -->
						<div class="mb-4">
							<x-label for="scheduled_at" :value="__('Scheduled Date and Time')"/>
							<x-input type="datetime-local"
								name="scheduled_at"
								id="scheduled_at"
								value="{{ old('scheduled_at', $appointment->scheduled_at->format('Y-m-d\TH:i')) }}"
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
								value="{{ old('reason', $appointment->reason) }}"
								required
							/>
						</div>

						<!-- Appointment Status -->
						<div class="mb-4">
							<x-label for="status" :value="__('Appointment Status')"/>
							<select id="status" name="status" class="block w-full mt-1">
								@foreach(\App\Enums\AppointmentStatus::values() as $status)
									<option value="{{ $status }}" {{ old('status', $appointment->status) == $status ? 'selected' : '' }}>
										{{ \App\Enums\AppointmentStatus::getLabel($status) }}
									</option>
								@endforeach
							</select>
						</div>

						<!-- Patient ID -->
						<div class="mb-4">
							<x-label for="patient_id" :value="__('Patient ID')"/>
							<x-input type="number"
								name="patient_id"
								id="patient_id"
								value="{{ old('patient_id', $appointment->patient_id) }}"
								required
							/>
						</div>

						<!-- Physician/Provider ID -->
						<div class="mb-4">
							<x-label for="physician_id" :value="__('Physician/Provider ID')"/>
							<x-input type="number"
								name="physician_id"
								id="physician_id"
								value="{{ old('physician_id', $appointment->physician_id) }}"
								required
							/>
						</div>

						<div class="flex items-center justify-end mt-4">
							<x-primary-button type="submit" class="ml-4">
								{{ __('Update') }}
							</x-primary-button>
						</div>
					</form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>