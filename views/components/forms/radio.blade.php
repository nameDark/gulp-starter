@props([
'name',
'class' => '',
'id' => '',
'value' => '',
'disabled' => false,
'checked' => false,
'required' => ''
])
@php
    $required = $required ? 'required' : '';
    $value = $value===''?1:$value;
    $dot_name = $name;
    $dot_name = str_replace(['[', ']'], ['.', ''], $dot_name);
@endphp
<label for="{!! $id?:$name !!}" class="inline-flex items-center form-input-wrap @error($dot_name) is-invalid @enderror ">
    <input id="{!! $id?:$name !!}" type="radio" {{ (old($dot_name) == $value || (!old($dot_name) && $checked)) ? 'checked' : '' }}
           class="form-radio {{ $class }}" value="{{ $value }}"
           name="{{ $name }}"
            {{ $required }}
            {{ $attributes }}>
    {{ $slot }}
</label>
{{--@error($dot_name)--}}
{{--<div class="text-red text-xsm">{{ $message }}</div>--}}
{{--@enderror--}}
