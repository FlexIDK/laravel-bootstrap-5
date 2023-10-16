@props([
    'value' => null,
    'options' => [],
    'default' => null,
])
@if($default)
  <option
    @if(is_null($value)) selected @endif
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
        @if(
          (is_array($value) && in_array($option['value'], $value)) ||
          $option['value'] === $value
        ) selected @endif
      >
        {{ $option['label'] }}</option>
    @endif
  @else
    <option
      value="{{ $key }}"
      @if(
        (is_array($value) && in_array($key, $value)) ||
        $key === $value
      ) selected @endif
    >
      {{ $option }}</option>
  @endif
@endforeach
