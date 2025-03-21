@props([
  'id' => null,
  'name' => null,
  'label' => null,
  'value' => null,
  'required' => false,
  'size' => null,
  'autofocus' => false,
  'readonly' => false,
  'disabled' => false,
  //
  'placeholder' => null,
  'feedback' => true,
])
@if($label)
<label
  @if($id) for="{{ $id }}" @endif
  class="form-label"
>
  {{ $label }}@if($required)<sup class="text-muted">*</sup>@endif
</label>
@endif

<textarea
  @if($id) id="{{ $id }}" @endif
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
