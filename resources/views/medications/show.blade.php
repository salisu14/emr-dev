<x-admin-layout>
    <x-slot name="header">
        {{ __('Medication Details') }}
    </x-slot>

    <x-flash />

    <x-errors class="mb-4" :errors="$errors" />

    <div class="bg-white px-4 py-4 inline-block overflow-hidden min-w-full rounded-lg shadow">
        <h2 class="text-4xl font-semibold text-center">{{ $medication->name }}</h2>
        <x-card>
            <div class="p-4">
                <p class="text-lg mb-2"><span class="font-semibold">Description:</span> {{ $medication->description }}</p>
                <p class="text-lg mb-2"><span class="font-semibold">Medication Date:</span> {{ $medication->created_at->toFormattedDateString() }}</p>
                <ul class="list-disc ml-4 mt-2">
                    @forelse($medication->prescriptions as $prescription)
                        <h3 class="text-xl font-semibold mt-4">Specification {{ $loop->iteration }}</h3>
                        <li class="text-lg font-medium">Doctor Name: {{ $prescription->doctor_name }}</li>
                        <li class="text-lg font-medium">Prescription Date: {{ \Carbon\Carbon::createFromFormat('Y-m-d', $prescription->prescription_date)->format('D F j, Y') }}</li>
                        <li class="text-lg font-medium">Note: {{ $prescription->note }}</li>
                        <h3 class="text-lg font-semibold mt-4">Beneficiary</h3>
                        <li class="text-lg font-medium flex items-center">
                            <img class="w-12 h-12 rounded-full mr-4" src="{{ $prescription->orphan->photo ? asset('storage/' . $prescription->orphan->photo) : asset('/images/team-2-800x800.jpg') }}" alt="Orphan Photo">
                            {{ $prescription->orphan->full_name }} ({{ $prescription->orphan->reg_no }})
                        </li>
                        <!-- Add a separator space between prescriptions -->
                        <div class="my-4"></div>
                    @empty
                        <li class="text-lg">No prescriptions available.</li>
                    @endforelse
                </ul>
            </div>
        </x-card>
        <div class="mt-4 flex justify-end">
            <x-anchor-link href="{{ route('admin.prescriptions.index') }}">
                Back
            </x-anchor-link>
        </div>
    </div>
</x-admin-layout>
