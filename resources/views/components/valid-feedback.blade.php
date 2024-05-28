@props([
  'active' => true,
  'message',
])
@php
$attributes = $attributes
  ->class([
    'valid-feedback',
  ])
  ->merge([
  ]);
@endphp
@if ($active)
<div {{ $attributes }}>
  {{ $message }}
</div>
@endif
