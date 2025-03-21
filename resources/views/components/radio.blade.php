@props([
  'id' => null,
  'name',
  'label',
  'value' => null,
  'required' => false,
  'autofocus' => false,
  'readonly' => false,
  'disabled' => false,
  //
  'checked' => false,
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
    @if($id) id="{{ $id }}--{{ md5((string) $value) }}" @endif
    @if($required) required @endif
    @if($autofocus) autofocus @endif
    @if($readonly) readonly @endif
    @if($disabled) disabled @endif
    {{ old($name) === $value ? 'checked' : '' }}
    @if($labelDisabled) aria-label="{{ $label }}" @endif
    {{ $attributes }}
  />

  @if (!$labelDisabled)
  <label
    class="form-check-label"
    @if($id) for="{{ $id }}--{{ md5((string) $value) }}" @endif
  >
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
