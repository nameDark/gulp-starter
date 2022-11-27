@props([
'name',
'class' => '',
'id' => '',
'options' => [],
'value' => '',
'disabled' => false,
'placeholder' => '',
'wrap' => 'mb-5',
'required' => ''
])
@php
    $dot_name = $name;
    $required = $required ? 'required' : '';
    $dot_name = str_replace(['[', ']'], ['.', ''], $dot_name);
@endphp
<div class="form-input-wrap @error($dot_name) is-invalid @enderror {{ $wrap }}">
    <select {{ $disabled ? 'disabled' : '' }}
            class="form-select {{ $class }}"
            id="{!! $id?:$name !!}"
            name="{{$name}}"
            {{ $required }}
            {{ $attributes }}>
        @if ($placeholder)
            <option value="">{{ $placeholder }}</option>
        @endif
        @foreach ($options as $key => $option)
            <option
                value="{{ $key }}"
                @if (old($dot_name) === $key || $value === $key)
                selected="selected"
                @endif
            >{!! $option !!}</option>
        @endforeach
    </select>
    @error($dot_name)
    <div class="text-red text-xsm">{{ $message }}</div>
    @enderror
</div>
