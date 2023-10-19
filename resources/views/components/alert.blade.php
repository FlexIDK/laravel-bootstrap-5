@props([
    'color' => null,
    'dismissible' => false,
    'class' => "",
])
@php
  $attributes = $attributes
    ->class([
        'alert',
        $colorAlert(),
        ($dismissible ? 'alert-dismissible fade show' : null),
    ])
    ->merge([
        'role' => 'alert',
    ]);
@endphp
<div {{ $attributes }}>
  <div>
    {{ $slot }}
  </div>

  @if($dismissible)
    <x-bootstrap::close
      dismiss="alert"
    />
  @endif
</div>
