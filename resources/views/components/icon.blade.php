@props([
    'name',
])

@php
$attributes = $attributes
    ->class([
        $categoryIcon(),
        ('fa-' . $name),
        $colorText(),
    ])
    ->merge([
    ]);
@endphp

@if($name)
  <i {{ $attributes }}></i>
@endif
