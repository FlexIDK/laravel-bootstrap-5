@props([
  'value' => null,
  'disabled' => false,
  'class' => "",
  'dropdown' => false,
  'toggle' => false,
  'active' => false,
  'nowrap' => false,
])
@php
$attributes = $attributes
  ->class([
      'btn',
      $colorButton(),
      $sizeButton(),
      $dropdown ? 'dropdown-toggle' : null,
      $disabled ? 'disabled' : null,
      $class,
      ($toggle && $active
        ? 'active'
        : null),
      ($nowrap ? 'text-nowrap' : null),
  ])
  ->merge([
      ...($toggle ? [
        'data-bs-toggle' => 'button',
      ] : []),
      ...(! $typeButton() ? [
        'href' => $href,
        'role' => 'button',
      ] : [
        'type' => $typeButton()
      ]),
      ...($disabled
        ? (! $typeButton() ? ['tabindex' => '-1'] : ['disabled' => true])
        : []),
      ...($dropdown ? ['data-bs-toggle' => 'dropdown'] : []),
  ]);
@endphp

@if(! $typeButton())
  <a
    {{ $attributes }}
  >@if ($value){{ $value }}@else{!! $slot !!}@endif</a>
@elseif(!$value)
  <button
    {{ $attributes }}
  >
    {!! $slot !!}</button>
@else
  <input
    {{ $attributes }}
    value="{{ $value }}"
  />
@endif

