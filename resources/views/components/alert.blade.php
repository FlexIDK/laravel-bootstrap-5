@props([
    'color' => 'success',
    'dismiss' => false,
    'class' => "",
])
<div
  class="
    alert
    alert-{{ $color }}
    @if($dismiss) alert-dismissible fade show @endif
    {{ $class }}
  "
  role="alert"
>
  <div>
    {{ $slot }}
  </div>

  @if($dismiss)
{{--
    <x-bs5::close
      dismiss="alert"
    />
--}}
  <button type="button"
          class="btn-close"
          data-bs-dismiss="alert"
          aria-label="{{ __('Close') }}" />
  @endif
</div>
