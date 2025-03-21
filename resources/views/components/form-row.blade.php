@props([
  'id' => null,
  'label' => null,
  'labelCol' => 3,
  'required' => false,
])
@php
$attributes = $attributes
  ->class([
      'row',
  ])
  ->merge([
    //
  ]);
@endphp
<div {{ $attributes }}>
  @if($label)
    <label
      @if($id) for="{{ $id }}" @endif
      class="
        col-form-label col-12
        @if($labelCol) col-sm-{{ $labelCol }} @endif
      "
    >
      {{ $label }}@if($required)<sup class="text-muted">*</sup>@endif
    </label>
  @endif

  <div class="
    col-12 @if ($labelCol) col-sm-{{ 12 - $labelCol }} @endif
    @if(! $label && $labelCol) offset-sm-{{ $labelCol }} @endif
  ">
    {!! $slot !!}
  </div>
</div>
