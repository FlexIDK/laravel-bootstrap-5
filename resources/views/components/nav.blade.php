@props([
  'type' => null,
  'items' => [],
  'position' => null,
  'style' => null,
  'fill' => false,
])
@php
$defaultClass = match($type) {
  'sidebar' => 'sidebar-nav',
  'vertical' => 'nav flex-column',
  'collapse' => 'nav-content collapse' . ($show ? ' show' : ''),
  default => 'nav',
};

if (
  $defaultClass === 'nav' &&
  in_array($type, ['tabs'])
) {
    $style = 'tabs';
}

$styleClass = match($style) {
  'tabs' => 'nav-tabs',
  'pills', => 'nav-pills',
  'underline' => 'nav-underline',
  default => null,
};

$positionClass = null;
if ($defaultClass === 'nav') {
  $positionClass = match($position) {
    'center' => 'justify-content-center',
    'end' => 'justify-content-end',
    default => null,
  };
}

$classIfActive = '';
if (
  $type === 'sidebar' ||
  $type === 'collapse'
) {
    $classIfActive = 'collapsed';
}

$attributes = $attributes
  ->class([
    $defaultClass,
    $styleClass,
    $positionClass,
    ($fill ? 'nav-fill' : null),
  ])
  ->merge([
    'id' => $id,
    ...($parentId
      ? ['data-bs-parent' => $parentId]
      : []),
  ]);

$items = array_filter($items);
@endphp

@if(count($items))
  <ul {{ $attributes }}>

  @foreach($items as $key => $item)
    @if (is_string($item))

      <li class="nav-heading">
        {!! $item !!}
      </li>

    @else
      @if(!\Arr::has($item, 'items'))

        <li class="nav-item">
          <a
            class="
              nav-link
              @if(\Arr::get($item, 'active', false)) active @else {{ $classIfActive }} @endif
              @if(\Arr::get($item, 'disabled', false)) disabled @endif
            "
            @if(\Arr::get($item, 'target')) target="{{ \Arr::get($item, 'target') }}" @endif
            href="{{ \Arr::get($item, 'url', \Arr::get($item, 'href', '#')) }}"
          >
            @if($item['html'] ?? null) {!! $item['html'] !!} @else {{ $item['text'] }} @endif
          </a>
        </li>

      @else

        <li class="nav-item">
          <a
            class="nav-link @if(!\Arr::get($item, 'active', false)) {{ $classIfActive }} @endif "
            data-bs-target="#{{ $id }}-{{ $key }}"
            data-bs-toggle="collapse"
            href="javascript:;"
          >

            @if($item['html'] ?? null) {!! $item['html'] !!} @else {{ $item['text'] ?? '' }} @endif

            <i class="fa fa-caret-down ms-auto"></i>
          </a>

          <x-bootstrap::nav
            type="collapse"
            :items="$item['items'] ?? []"
            :id="$id . '-' . $key"
            :parent-id="$id"
            :show="(bool) \Arr::get($item, 'show', false)"
          />
        </li>

      @endif
    @endif
  @endforeach

  </ul>
@endif
