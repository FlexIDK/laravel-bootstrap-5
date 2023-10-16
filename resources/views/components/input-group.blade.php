@props([
    'name',
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
<label for="label-{{ $name }}"
       class="form-label">
  {{ $label }}
</label>
<div class="
  input-group
  @if($size) input-group-{{ $size }} @endif
  @error($name) has-validation @enderror
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

  @if($feedback)
    @error($name)
    <x-bootstrap::invalid-feedback
      :message="$message" />
    @enderror
  @endif
</div>
