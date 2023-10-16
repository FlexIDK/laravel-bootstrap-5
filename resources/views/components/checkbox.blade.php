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
])
<div class="form-check @if($inline) form-check-inline @endif ">
  <input
    @if($id) id="{{ $id }}" @elseif($name) id="label-{{ $name }}" @endif
    class="form-check-input"
    type="checkbox"
    @if($name) name="{{ $name }}" @endif
    value="{{ $value }}"
    @if($required) required @endif
    @if($disabled) disabled @endif
    @if($readonly) readonly @endif
    {{ $currentChecked ? 'checked' : '' }}
  />

  @if ($label)
  <label
    class="form-check-label"
    @if($name) for="label-{{ $name }}" @endif
  >
    {{ $label }}
  </label>
  @endif

@if($feedback && $name)
  @error($name)
  <x-bootstrap::invalid-feedback
    :message="$message" />
  @enderror
@endif
</div>
