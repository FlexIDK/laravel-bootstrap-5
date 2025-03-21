@props([
  'label' => null,
  'id' => null,
  'name' => null,
  'value' => "1",
  'required' => false,
  'disabled' => false,
  'readonly' => false,
  'inline' => false,
  'labelDisabled' => false,
  'feedback' => true,
  'checked' => false,
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
<div {{ $attributes}} >
  <input
    @if($id) id="{{ $id }}" @endif
    class="
      form-check-input
      @if($name) @error($name) is-invalid @enderror @endif
    "
    type="checkbox"
    @if($name && !$disabled) name="{{ $name }}" @endif
    value="{{ $value }}"
    @if($required) required @endif
    @if($disabled) disabled @endif
    @if($readonly) readonly @endif
    {{ $currentChecked() ? 'checked' : '' }}
    {{ $attributes }}
  />

  @if ($label)
  <label
    class="form-check-label"
    @if($id) for="{{ $id }}" @endif
  >
    {{ $label }}@if($required)<sup class="text-muted">*</sup>@endif
  </label>
  @endif

@if($feedback && $name)
  @error($name)
  <x-bootstrap::invalid-feedback
    :message="$message" />
  @enderror
@endif
</div>
