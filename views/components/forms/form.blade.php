@props([
'method' => 'POST',
'action' => '',
'hasFiles' => false,
])
<form method="{{ $method }}"
    {!! $action ? 'action="'.$action.'"' : '' !!}
    {!! $hasFiles ? 'enctype="multipart/form-data"' : '' !!}
    {{ $attributes }}>
    @csrf
    @method($method)

    {{ $slot }}
</form>
