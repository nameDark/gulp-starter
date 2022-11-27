@props([
'name',
'class' => '',
'id' => '',
'rows' => 4,
'wrap' => 'mb-5',
'required' => ''
])
@php
    $dot_name = $name;
    $required = $required ? 'required' : '';
    $dot_name = str_replace(['[', ']'], ['.', ''], $dot_name);
@endphp
<div class="form-input-wrap @error($dot_name) is-invalid @enderror {{ $wrap }}">
    <textarea
        class="form-textarea {{ $class }}"
        name="{{ $name }}"
        id="{!! $id?:$name !!}"
        rows="{{ $rows }}"
        {{ $required }}
        {{ $attributes }}
    >{{ old($dot_name, $slot) }}</textarea>
    @error($dot_name)
    <div class="text-red text-xsm">{{ $message }}</div>
    @enderror
</div>

