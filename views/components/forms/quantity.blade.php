@props([
'name',
'class' => '',
'id' => '',
'type' => 'text',
'value' => '',
'min' => '',
'step' => '1',
'disabled' => false
])
@php
    $dot_name = $name;
    $dot_name = str_replace(['[', ']'], ['.', ''], $dot_name);
@endphp

<div class="flex @error($dot_name) is-invalid @enderror "
     x-data="{step:{{ $step }}, current_val:{{ $value }}, min_val:{{ $min?:$value }}}">
    <div x-on:click="if(current_val != min_val) {current_val = (current_val-step)>min_val?(current_val-step):min_val; $refs.{{ $id }}.value = current_val; force_change($refs.{{ $id }})} "
         x-bind:class="{'cursor-not-allowed': current_val == min_val, 'cursor-pointer': current_val != min_val}"
         class="cursor-not-allowed w-12 md:w-14 h-12 md:h-14 border-r-0 rounded-bl rounded-tl flex justify-center items-center border border-silver transition-all transition">
        <svg width="8" height="3" viewBox="0 0 8 3" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M7.83887 2.2262H0.213867V0.0880127H7.83887V2.2262Z" fill="black"/></svg>
    </div>
    <input  x-ref="{{ $id }}"
            x-on:input="$event.target.value = $event.target.value.replace(/[^0-9]/g, '')"
            x-on:change="parseValue = parseInt($refs.{{ $id }}.value);if (isNaN(parseValue) || parseValue == 0) {current_val = min_val} else {current_val = (Math.ceil(parseValue/min_val))*min_val } $refs.{{ $id }}.value = current_val"
            type="text"
            id="{{ $id }}"
            data-id="{{ $id }}"
            class="text-center w-12 md:w-14 h-12 md:h-14 border border-silver rounded-none quantity-input {{ $class }}"
            step="{{ $step }}"
            min="{{ $min?:$value }}"
{{--            max=""--}}
            name="{{ $name }}"
            value="{{ $value }}"
            title="{{ __('Quantity') }}"
            size="4"
            pattern="[0-9]{1,}"
            inputmode="numeric" />
    <div x-on:click="current_val = current_val+step; $refs.{{ $id }}.value = current_val; force_change($refs.{{ $id }})"
         class="w-12 md:w-14 h-12 md:h-14 border-l-0 rounded-br rounded-tr flex justify-center items-center cursor-pointer border border-silver transition-all transition">
        <svg width="12" height="12" viewBox="0 0 12 12" fill="none" xmlns="http://www.w3.org/2000/svg"><path d="M6.98633 4.74689H11.7441V6.60541H6.98633V11.4907H4.80664V6.60541H0.0488281V4.74689H4.80664V0.233337H6.98633V4.74689Z" fill="black"/></svg>
    </div>
</div>