@props([
    'name' => null,
    'label' => null,
    'labelCol' => 3,
])
@php
  $attributes = $attributes
    ->class([
        'row',
    ])
@endphp
<div {{ $attributes }}>
  @if($label)
    <label
      @if($name) for="label-{{ $name }}" @endif
      class="col-form-label col-{{ $labelCol }}">
      {{ $label }}
    </label>
  @endif

  <div class="
    @if ($labelCol >= 12) col-12 @else col-{{ 12 - $labelCol }} @endif
    @if(!$label && $labelCol < 12) offset-{{ $labelCol }} @endif
  ">
    {!! $slot !!}
  </div>
</div>
