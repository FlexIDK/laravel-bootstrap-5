@props([
  'type' => 'nav',
  'sidebar' => false,
  'id' => null,
  'items' => [],
  'active' => false,
  'class' => null,
])
@php
$componentId = "components-bootstrap-nav-" . rand(1000, 9999);
$items = array_filter($items);
@endphp

@if(count($items))
  <ul
    class="
    @if($class) {{ $class }} @endif
    @if($type === 'sidebar')
      sidebar-nav
    @elseif($type === 'tabs')
      nav-tabs
    @else
      nav
    @endif
    "
    @if($id) id="{{ $id }}" @endif
  >

  @foreach($items as $key => $item)
    @if (is_string($item))

      <li class="nav-heading">
        {!! $item !!}
      </li>

    @else
      @if(!\Arr::has($item, 'items'))

        <li class="nav-item">
          <a
            class="nav-link @if(\Arr::get($item, 'active')) active @else collapsed @endif "
            href="{{ \Arr::get($item, 'url') }}"
          >
            {!! \Arr::get($item, 'value') !!}
          </a>
        </li>

      @else

        <li class="nav-item">
          <a
            class="nav-link @if(!\Arr::get($item, 'active')) collapsed @endif "
            data-bs-target="#{{ $componentId }}-{{ $key }}"
            data-bs-toggle="collapse"
            href="javascript:;"
          >
            {!! \Arr::get($item, 'value') !!}

            <i class="fa fa-caret-down ms-auto"></i>
          </a>

          <x-bootstrap::nav-submenu
            type="collapse"
            id="{{ $componentId }}-{{ $key }}"
            :items="$item['items'] ?? []"
            :parent="$id"
            :active="(bool) \Arr::get($item, 'active')"
          />
        </li>

      @endif
    @endif
  @endforeach

  </ul>
@endif
