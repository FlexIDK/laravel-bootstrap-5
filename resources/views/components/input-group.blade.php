@props([
  'name' => null,
  'label' => null,
  'value' => null,
  'type' => 'text',
  'required' => false,
  'size' => null,
  'autocomplete' => null,
  'autofocus' => false,
  'feedback' => true,
  'readonly' => false,
  'disabled' => false,
  'id' => null,
  'placeholder' => null,
  'plaintext' => false,
  'after' => null,
])
@php
use \Illuminate\View\ComponentSlot;
@endphp

@if($label)
<label
  @if($id) for="{{ $id }}" @endif
  class="form-label"
>
  {{ $label }}@if($required)<sup class="text-muted">*</sup>@endif
</label>
@endif

<div class="
  input-group
  @if($size) input-group-{{ $size }} @endif
  @if($name) @error($name) has-validation @enderror @endif
">

  @if($slot instanceof ComponentSlot && !$slot->isEmpty())
    {{ $slot }}
  @endif

  <x-bootstrap::input
    :id="$id"
    :placeholder="$placeholder"
    :plaintext="$plaintext"
    :type="$type"
    :name="$name"
    :value="$value"
    :autocomplete="$autocomplete"
    :required="$required"
    :autofocus="$autofocus"
    :disabled="$disabled"
    :readonly="$readonly"
    :feedback="false"
  />

  @if($after instanceof ComponentSlot && !$after->isEmpty())
    {{ $after }}
  @endif

  @if($feedback && $name)
    @error($name)
    <x-bootstrap::invalid-feedback
      :message="$message" />
    @enderror
  @endif
</div>
