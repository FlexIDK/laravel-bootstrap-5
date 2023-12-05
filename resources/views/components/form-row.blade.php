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
      class="col-form-label col-12 col-sm-{{ $labelCol }}">
      {{ $label }}
    </label>
  @endif

  <div class="
    col-12 @if ($labelCol < 12) col-sm-{{ 12 - $labelCol }} @endif
    @if(!$label && $labelCol < 12) offset-sm-{{ $labelCol }} @endif
  ">
    {!! $slot !!}
  </div>
</div>
