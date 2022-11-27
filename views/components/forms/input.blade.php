@props([
'name',
'class' => '',
'id' => '',
'type' => 'text',
'value' => '',
'disabled' => false,
'clear' => false,
'wrap' => 'mb-5',
'required' => ''
])
@php
    $required = $required ? 'required' : '';
    $dot_name = $name;
    $dot_name = str_replace(['[', ']'], ['.', ''], $dot_name);
@endphp
<div class="form-input-wrap @error($dot_name) is-invalid @enderror {{ $wrap }}">
    <input {{ $disabled ? 'disabled' : '' }}
        class="form-input {{ $class }}"
        name="{{ $name }}"
        id="{!! $id?:$name !!}"
        type="{{ $type }}"
        value="{{ $clear?'':old($dot_name, $value) }}"
        {{ $required }}
        {{ $attributes }} />

    @if($type != 'hidden')
        @error($dot_name)
        <div class="text-red text-xsm">{{ $message }}</div>
        @enderror
    @endif
</div>
