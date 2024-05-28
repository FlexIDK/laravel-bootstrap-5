@props([
  'name',
  'value',
])
@php
$attributes = $attributes
  ->class([
  ])
  ->merge([
      'type' => 'hidden',
      'name' => $name,
      'value' => $value
  ]);
@endphp
<input
  {{ $attributes }}
>
