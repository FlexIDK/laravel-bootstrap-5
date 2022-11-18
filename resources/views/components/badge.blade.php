@props([
    'bg' => 'primary',
    'textBg' => null,
    'rounded' => false,
    'label' => null,
    'dot'   => false,
    'icon'  => null,
])

@php
$attributes = $attributes
    ->class([
        'badge',
        'bg-' . $bg => $bg && !$textBg,
        'text-bg-' . $textBg => $textBg,
        'rounded-pill' => $rounded && !$dot,

        ...($dot ? [
            'border',
            'rounded-circle',
            'p-2',
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
    <x-bs5::icon :name="$icon"/>

    {{ $slot }}
  @endif

  @if($label)
  <span class="visually-hidden">{{ $label }}</span>
  @endif
</span>
@endif
