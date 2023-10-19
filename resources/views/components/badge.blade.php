@props([
  'color' => null,
  'rounded' => false,
  'dot'   => false,
  'dotSize' => 1,
])

@php
$attributes = $attributes
    ->class([
        'badge',
        $colorBadge(),
        $rounded && !$dot ? 'rounded-pill' : null,

        ...($dot ? [
            'border',
            'rounded-circle',
            'p-' . ($dotSize ?: 1),
        ] : [])
    ])
    ->merge([
        //
    ])
;

$isVisible = false;
if (
  $dot
  || ($slot || $icon)
) {
  $isVisible = true;
}
@endphp

@if ($isVisible)
<span {{ $attributes }}>
  @if(!$dot)
    {{ $slot }}
  @else
    <span class="visually-hidden">
      {{ $slot }}
    </span>
  @endif
</span>
@endif
