@props([
  'href' => null,
  'type' => 'submit',
  'value' => null,
  'disabled' => false,
  'class' => "",
  'size' => null,
  'dropdown' => false,
  'toggle' => false,
  'active' => false,
])
@php
if (
  is_null($href) &&
  $type === 'link'
) {
    $href = 'javascript:;';
}
elseif (!is_null($href)) {
    $type = 'link';
}

$attributes = $attributes
  ->class([
      'btn',
      $colorButton,
      $size ? 'btn-' . $size : null,
      $dropdown ? 'dropdown-toggle' : null,
      $disabled ? 'disabled' : null,
      $class,
      ($toggle && $active && $type === 'link'
        ? 'active'
        : null),
  ])
  ->merge([
      ...($toggle && $type !== 'link' ? [
        'data-bs-toggle' => 'button',
      ] : []),
      ...($type === 'link' ? [
        'href' => $href,
      ] : [
        'type' => $type
      ]),
      ...($disabled
        ? ($type !== 'link' ? ['tabindex' => '-1'] : ['disabled' => true])
        : []),
      ...($dropdown ? ['data-bs-toggle' => 'dropdown'] : []),
  ]);
@endphp

@if($type === 'link')
  <a
    {{ $attributes }}
  >{!! $slot !!}</a>
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

