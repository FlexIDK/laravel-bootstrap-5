@props([
    'id' => null,
    'name' => null,
    'label' => null,
    'value' => null,
    'required' => false,
    'size' => null,
    'autofocus' => false,
    'placeholder' => null,
    'readonly' => false,
    'disabled' => false,
    'feedback' => true,
])
@if($label)
<label for="label-{{ $name }}"
       class="form-label">
  {{ $label }}
</label>
@endif

<textarea
  @if($id) id="{{ $id }}" @elseif($name) id="label-{{ $name }}" @endif
  class="
    form-control
    @if($name) @error($name) is-invalid @enderror @endif
    @if($size) form-control-{{ $size }} @endif
  "
  @if($name && !$disabled) name="{{ $name }}" @endif
  @if($placeholder) placeholder="{{ $placeholder }}" @endif
  @if($required) required @endif
  @if($autofocus) autofocus @endif
  @if($readonly) readonly @endif
  @if($disabled) disabled @endif
  {{ $attributes }}
>{{ $currentValue() }}</textarea>

@if($feedback && $name)
  @error($name)
  <x-bootstrap::invalid-feedback
    :message="$message" />
  @enderror
@endif
