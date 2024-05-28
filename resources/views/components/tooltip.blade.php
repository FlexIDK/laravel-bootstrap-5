@props([
  'tag' => 'span',
  'title' => null,
  'placement' => null,
  'inline' => false,
])

@php
$isHtml = !!(strip_tags($title) != $title);

$attributes = $attributes
  ->class([
    ...($inline ? [
        'position-relative',
        'd-inline-block'
    ] : []),
  ])
  ->merge([
    'data-bs-toggle' => 'tooltip',
    'data-bs-title' => $title,

    ...($isHtml ? [
      'data-bs-html' => 'true',
    ] : []),

    ...($placement ? [
      'data-bs-placement' => $placement,
    ] : [])
  ]);
@endphp

<{{ $tag }}
  {{ $attributes }}
>
  {{ $slot }}</{{ $tag }}>
