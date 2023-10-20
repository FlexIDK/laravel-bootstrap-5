@props([
  'value' => null,
  'color' => 'primary',
  'disabled' => false,
  'outline' => false,
  'size' => null,
  'dropdownPosition' => null,
])
@php
$classPosition = match ($dropdownPosition) {
  'start' => 'dropstart',
  'end' => 'dropend',
  'up' => 'dropup',
  'up-center' => 'dropup-center',
  'down-center' => 'dropdown-center',
//  'down' => 'dropdown',
  default => 'dropdown',
};
@endphp

<div class="btn-group {{ $classPosition  }}">
  <x-bootstrap::button
    type="button"
    :dropdown="true"
    :color="$color"
    :value="$value"
    :disabled="$disabled"
    :outline="$outline"
    :size="$size"
  >{{ $slot }}</x-bootstrap::button>

  {{ $dropdown }}
</div>

