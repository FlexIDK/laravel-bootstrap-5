@php
$attributes = $attributes
  ->class([
    'input-group-text',
  ])
  ->merge([
  ]);
@endphp
<span {{ $attributes }}>
  {{ $slot }}
</span>
