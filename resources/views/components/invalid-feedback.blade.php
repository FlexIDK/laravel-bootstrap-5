@props([
  'active' => true,
  'message',
])
@php
$attributes = $attributes
  ->class([
      'invalid-feedback',
  ])
  ->merge([
    //
  ]);
@endphp
@if ($active)
<div {{ $attributes }}>
  {{ $message }}
</div>
@endif
