@props([
    'color' => null,
    'dismiss' => null,
    'disabled' => false,
])

@php
  $attributes = $attributes->class([
      'btn-close',
      'btn-close-' . $color => $color,
  ])->merge([
      'type' => 'button',
      'data-bs-dismiss' => $dismiss,
      'aria-label' => __('bs5::components.Close'),
      'disabled' => $disabled,
  ]);
@endphp

<button {{ $attributes }}></button>
