@props([
    'name',
    'value',
])
@php
$attributes = $attributes
    ->merge([
        'type' => 'hidden',
        'name' => $name,
        'value' => $value
    ]);
@endphp
<input
  {{ $attributes }}
>
