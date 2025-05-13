@props(['href', 'icon', 'label', 'active' => false])

<li>
    <a href="{{ $href }}"
        {{ $attributes->merge([
            'class' =>
                'flex items-center gap-x-3.5 py-3 px-2.5 rounded-lg text-sm focus:outline-none ' .
                ($active
                    ? 'bg-blue-600 text-white hover:bg-blue-600 hover:text-white'
                    : 'text-gray-800 hover:bg-blue-600 hover:text-white'),
        ]) }}>
        {{-- Slot icon --}}
        {{ $icon ?? $slot }}
        <span>{{ $label }}</span>
    </a>
</li>
