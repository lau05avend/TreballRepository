@props(['value'])

<label {{ $attributes->merge(['style'=>'','class' => 'block font-medium text-sm text-gray-700']) }}>
    {{ $value ?? $slot }}
</label>
