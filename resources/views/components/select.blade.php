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
  'multiple' => false,
  'options' => [],
  'default' => null,
  'lines' => 1,
  'feedback' => true,
])
@if($label)
  <label
    @if ($id) for="{{ $id }}" @endif
    class="form-label"
  >
    {{ $label }}@if($required)<sup class="text-muted">*</sup>@endif
  </label>
@endif

<select
  @if($id) id="{{ $id }}" @endif
  @if($name && !$disabled) name="{{ $name }}" @endif
  class="
    form-select
    @if($size) form-size-{{ $size }} @endif
    @if($name) @error($name) is-invalid @enderror @endif
  "
  @if($autofocus) autofocus @endif
  @if($readonly) readonly @endif
  @if($disabled) disabled @endif
  @if($multiple) multiple @endif
  @if($required) required @endif
  @if($lines > 1) size="{{ $lines }}" @endif
  {{ $attributes }}
>
  <x-bootstrap::select-options
    :default="$default"
    :options="$options"
    :value="$currentValue()"
  />
</select>

@if($feedback && $name)
  @error($name)
  <x-bootstrap::invalid-feedback
    :message="$message" />
  @enderror
@endif
