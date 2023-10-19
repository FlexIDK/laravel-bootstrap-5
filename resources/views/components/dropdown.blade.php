@props([
    'position' => null,
    'after' => null,
])
<?php
use \Illuminate\View\ComponentSlot;

$hasSlot = !! (
    !$slot->isEmpty() ||
    ($after && !$after?->isEmpty())
);

$tagParent = $hasSlot ? 'div' : 'ul';

$attributes = $attributes
  ->class([
    'dropdown-menu',
    ($position === 'start' ? 'dropdown-menu-start' : null),
    ($position === 'end' ? 'dropdown-menu-end' : null),
  ])->merge([
  ]);
?>
<{{ $tagParent }} {{ $attributes }}>

@if($slot instanceof ComponentSlot && !$slot->isEmpty()){{ $slot }}@endif

@foreach($items() as $item)
  @if($tagParent === 'ul') <li> @endif

  @if ($item['type'] === 'header')
    <div class="
      dropdown-header
      @if ($item['class'] ?? null) {{ $item['class'] }} @endif
    ">
      @if($item['html']) {!! $item['html'] !!} @else {{ $item['text'] }} @endif
    </div>

  @elseif ($item['type'] === 'footer')
    <div class="
      dropdown-footer
      @if ($item['class'] ?? null) {{ $item['class'] }} @endif
    ">
      @if($item['html']) {!! $item['html'] !!} @else {{ $item['text'] }} @endif
    </div>

  @elseif ($item['type'] === 'divider')
    <hr class="
      dropdown-divider
      @if ($item['class'] ?? null) {{ $item['class'] }} @endif
    " />

  @elseif ($item['type'] === 'text')
    <span class="
      dropdown-item-text
      @if ($item['class'] ?? null) {{ $item['class'] }} @endif
    ">
      @if($item['html']) {!! $item['html'] !!} @else {{ $item['text'] }} @endif
    </span>

  @elseif ($item['type'] === 'link')
    <a
      href="{{ $item['href'] }}"
      @if ($item['target'] ?? null)
        @if($item['target'])
          target="{{ $item['target'] }}"
        @else
          target="_blank"
        @endif
      @endif
      class="
        dropdown-item
        @if ($item['active'] ?? null) active @endif
        @if ($item['disabled'] ?? null) disabled @endif
        @if ($item['class'] ?? null) {{ $item['class'] }} @endif
      "
    >
      @if($item['html']) {!! $item['html'] !!}@else {{ $item['text'] }}@endif</a>
  @endif

  @if($tagParent === 'ul') </li> @endif
@endforeach

@if($after instanceof ComponentSlot && !$after->isEmpty()){{ $after }}@endif

</{{ $tagParent }}>