@php
$attributes = $attributes
  ->class([
    //
  ])
  ->merge([
    //
  ]);
@endphp
<div {{ $attributes }}>
  {{ $slot }}
</div>
