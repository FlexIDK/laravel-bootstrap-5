@props([
    'name',
    'label' => null,
    'multiple' => false,
    'size' => null,
    'value' => null,
    'options' => [],
    'default' => null,
    'disabled' => false,
    'readonly' => false,
    'lines' => 1,
    'feedback' => true,
])
@if($label)
  <label for="label-{{ $name }}"
         class="form-label">
    {{ $label }}
  </label>
@endif


<select
  name="{{ $name }}"
  class="
    form-select
    @if($size) form-size-{{ $size }} @endif
    @error($name) is-invalid @enderror
  "
  @if($readonly) readonly @endif
  @if($disabled) disabled @endif
  @if($multiple) multiple @endif
  @if($lines > 1) size="3" @endif
>
  <x-bootstrap::select-options
    :default="$default"
    :options="$options"
    :value="$currentValue"
  />
</select>

@if($feedback)
  @error($name)
  <x-bootstrap::invalid-feedback
    :message="$message" />
  @enderror
@endif
