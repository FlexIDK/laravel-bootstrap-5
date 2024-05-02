@props([
    'id' => null,
    'name' => null,
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
  <label
    @if ($name) for="label-{{ $name }}" @endif
    class="form-label">
    {{ $label }}
  </label>
@endif

<select
  @if($id) id="{{ $id }}" @elseif($name) id="label-{{ $name }}" @endif
  @if($name && !$disabled) name="{{ $name }}" @endif
  class="
    form-select
    @if($size) form-size-{{ $size }} @endif
    @if($name) @error($name) is-invalid @enderror @endif
  "
  @if($readonly) readonly @endif
  @if($disabled) disabled @endif
  @if($multiple) multiple @endif
  @if($lines > 1) size="3" @endif
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
