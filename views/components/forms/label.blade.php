@props([
'class' => '',
'for' => '',
])

<label for="{{ $for }}" class="{{ $class }}" {{ $attributes }}>
    {{ $slot }}
</label>
