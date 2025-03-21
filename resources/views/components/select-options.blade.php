@props([
  'value' => null,
  'options' => [],
  'default' => null,
])
@if($default)
  <option
    value=""
    @if (\One23\LaravelBootstrap5\Components\SelectOptions::isSelected(null, $value)) selected @endif
  >
    {{ $default }}
  </option>
@endif

@foreach($options as $key => $option)
  @php
      // todo optgroup
  @endphp
  @if(is_array($option))
    @if(
      $option['label'] ?? null &&
      $option['value'] ?? null
    )
      <option
        value="{{ $option['value'] }}"
        @if (\One23\LaravelBootstrap5\Components\SelectOptions::isSelected($option['value'], $value)) selected @endif
      >
        {{ $option['label'] }}</option>
    @endif
  @else
    <option
      value="{{ $key }}"
      @if (\One23\LaravelBootstrap5\Components\SelectOptions::isSelected($key, $value)) selected @endif
    >
      {{ $option }}</option>
  @endif
@endforeach
