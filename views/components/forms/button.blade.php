@props([
'type' => 'submit',
'class' => '',
])
<button type="{{ $type }}" {{ $attributes }}
        class=" disabled:opacity-25 {{ $class }}">
    {{ $slot }}
</button>
