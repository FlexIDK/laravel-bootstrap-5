@props([
    'name' => null,
    'label',
    'value' => null,
    'type' => 'text',
    'required' => false,
    'iconBefore' => null,
    'iconAfter' => null,
    'size' => null,
    'autocomplete' => null,
    'autofocus' => false,
    'feedback' => true,
    'readonly' => false,
    'disabled' => false,
])
<label
  @if($name) for="label-{{ $name }}" @endif
  class="form-label">
  {{ $label }}
</label>
<div class="
  input-group
  @if($size) input-group-{{ $size }} @endif
  @if($name) @error($name) has-validation @enderror @endif
">
  @if ($iconBefore)
    <x-bootstrap::input-group-text
      :content='"<i class=\"{$iconBefore}\"></i>"' />
  @endif

  <x-bootstrap::input
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

  @if ($iconAfter)
    <x-bootstrap::input-group-text
      :content='"<i class=\"{$iconAfter}\"></i>"' />
  @endif

  @if($feedback && $name)
    @error($name)
    <x-bootstrap::invalid-feedback
      :message="$message" />
    @enderror
  @endif
</div>
