@php
$attributes = $attributes
    ->class([
        'alert',
        'alert-' . $color => $color,
        'alert-dismissible fade show' => $dismissible,
    ])
    ->merge([
        'role' => 'alert',
    ])
;
@endphp

<div {{ $attributes }}>
  @if($label && $slot)

  @else
  {{ $label ?? $slot }}
  @endif

  @if($dismissible)
    <x-bs5::close
      dismiss="alert"
    />
  @endif
</div>
