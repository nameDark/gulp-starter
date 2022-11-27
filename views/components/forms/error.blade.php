@props([
'errors',
'show' => false,
])
@if ($errors->any())
    <div {{ $attributes }}>
        <div class="font-medium text-center text-red">
            {{ __('You have errors') }}
        </div>
    </div>
    @if($show)
        <ul class="mb-4 list-disc list-inside text-xsm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    @endif
@endif
