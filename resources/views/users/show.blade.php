<x-app-layout>
    <div>
        <h1>{{ $user->name }}</h1>

        <p class="text-blue-700 text-2xl">You are a {{ $user->hasRole('instructor') ? 'Instructor' : 'Student' }}</p>
    </div>
</x-app-layout>