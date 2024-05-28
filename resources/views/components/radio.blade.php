@props([
  'name',
  'label',
  'value' => null,
  'checked' => false,
  'required' => false,
  'disabled' => false,
  'inline' => false,
  'labelDisabled' => false,
])
@php
$attributes = $attributes
  ->class([
    'form-check',
    ($inline ? 'form-check-inline' : null),
  ])
  ->merge([
    //
  ]);
@endphp
<div {{ $attributes }}>
  <input
    class="form-check-input"
    type="radio"
    @if($name && $disabled) name="__disabled__{{ $name }}"
    @elseif($name) name="{{ $name }}" @endif
    value="{{ $value }}"
    id="label-{{ $name }}-{{ $value }}"
    @if($required) required @endif
    @if($disabled) disabled @endif
    {{ old($name) === $value ? 'checked' : '' }}
    @if($labelDisabled) aria-label="{{ $label }}" @endif
    {{ $attributes }}
  />

  @if (!$labelDisabled)
  <label class="form-check-label"
         for="label-{{ $name }}-{{ $value }}">
    {{ $label }}
  </label>
  @endif

  @if($name)
    @error($name)
    <x-bootstrap::invalid-feedback
      :message="$message" />
    @enderror
  @endif
</div>
