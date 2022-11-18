@props([
    'name' => null,
    'color' => null,
])

@php
$attributes = $attributes
    ->class([
        'fa',
        'fa-' . $name => $name,
        'text-' . $color => $color,
    ])
    ->merge([
        //
    ])
;
@endphp

@if($name)
  <i {{ $attributes }}></i>
@endif
