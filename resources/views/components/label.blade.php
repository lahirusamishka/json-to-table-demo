@props(['value'])

<label {{ $attributes->merge(['class' => 'uppercase block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
