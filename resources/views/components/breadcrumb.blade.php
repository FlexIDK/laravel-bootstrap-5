@props([
  'color' => 'success',
  'dismiss' => false,
  'items' => [],
  'activeLatest' => false,
])
@php
$attributes = $attributes
  ->class([
  ])
  ->merge([
    'aria-label' => 'breadcrumb',
  ]);
@endphp
@if (count($items))
<nav {{ $attributes }}>
  <ol class="breadcrumb">
  @foreach($items as $item)
    @if(is_string($item))
        <li class="breadcrumb-item @if($loop->last && $activeLatest) active @endif "
            aria-current="page">
        {{ $item  }}
    @elseif (
        !\Arr::get($item, 'url') ||
        \Arr::get($item, 'active') ||
        ($loop->last && $activeLatest)
    )
    <li class="breadcrumb-item @if(\Arr::get($item, 'active')) active @endif "
        aria-current="page">
      {{ $item['value']  }}
    @else
        <li class="breadcrumb-item"
            aria-current="page">
          <a
            href="{{ \Arr::get($item, 'url') }}"
            @if(\Arr::get($item, 'target')) target="_blank" @endif
          >
            {{ $item['value']  }}</a>
    @endif

      </li>
  @endforeach
  </ol>
</nav>
@endif
