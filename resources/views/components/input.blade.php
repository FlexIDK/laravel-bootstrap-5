@props([
    'id' => null,
    'name' => null,
    'label' => null,
    'value' => null,
    'type' => 'text',
    'required' => false,
    'size' => null,
    'autocomplete' => null,
    'autofocus' => false,
    'placeholder' => null,
    'readonly' => false,
    'disabled' => false,
    'plaintext' => false,
    'feedback' => true,
])
@php
if($plaintext) {
  $readonly = true;
}
@endphp
@if($label)
<label
  @if($name) for="label-{{ $name }}" @endif
  class="form-label">
  {{ $label }}
</label>
@endif

<input
  @if($id) id="{{ $id }}" @elseif($name) id="label-{{ $name }}" @endif
  type="{{ $type }}"
  class="
    @if($plaintext) form-control-plaintext @else form-control @endif
    @if($name) @error($name) is-invalid @enderror @endif
    @if($size) form-control-{{ $size }} @endif
  "
  @if($name && !$disabled) name="{{ $name }}" @endif
  value="{{ $currentValue() }}"
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($autocomplete === true) autocomplete @endif
  @if(is_string($autocomplete)) autocomplete="{{ $autocomplete }}" @endif
  @if($required) required @endif
  @if($autofocus) autofocus @endif
  @if($readonly) readonly @endif
  @if($disabled) disabled @endif
  {{ $attributes }}
>

@if($feedback && $name)
  @error($name)
  <x-bootstrap::invalid-feedback
    :message="$message" />
  @enderror
@endif
