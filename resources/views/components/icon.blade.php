@props([
    'name' => null,
    'color' => null,
])

@php
$attributes = $attributes
    ->class([
        'fa',
        ($name ? 'fa-' . $name : null),
        ($color ? 'text-' . $color : null),
    ])
    ->merge([
        //
    ])
;
@endphp

@if($name)
  <i {{ $attributes }}></i>
@endif
