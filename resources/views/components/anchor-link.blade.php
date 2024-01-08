<a {{ $attributes->merge(['class' => 'py-2 px-4 text-center bg-blue-500 rounded-lg text-white text-sm hover:bg-blue-600']) }}>
    {{ $icon ?? '' }}
    <span class="mx-3">{{ $slot }}</span>
</a>