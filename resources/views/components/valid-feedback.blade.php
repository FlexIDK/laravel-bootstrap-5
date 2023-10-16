@props([
    'active' => true,
    'message',
])
@if ($active)
<div class="valid-feedback">
  {{ $message }}
</div>
@endif
