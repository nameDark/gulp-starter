@props([
'name',
'class' => '',
'id' => '',
'value' => 1,
'checked' => false,
'required' => ''
])
@php
    if($checked === "false" || $checked === false || $checked === '0' || $checked === 0):
        $checked = false;
    endif;
    $required = $required ? 'required' : '';
    $dot_name = $name;
    $dot_name = str_replace(['[', ']'], ['.', ''], $dot_name);
@endphp
<label for="{!! $id?:$name !!}" class="inline-flex items-center mb-5 form-input-wrap @error($dot_name) is-invalid @enderror ">
    <input id="{!! $id?:$name !!}" type="checkbox" {{ (old($dot_name) == $value || (!old($dot_name) && $checked)) ? 'checked' : '' }}
           class="mr-6 form-checkbox {{ $class }}" value="{{ $value }}"
           name="{{ $name }}"
            {{ $required }}
            {{ $attributes }}>
    {{ $slot }}
</label>
{{--@error($dot_name)--}}
{{--<div class="text-red text-xsm">{{ $message }}</div>--}}
{{--@enderror--}}
