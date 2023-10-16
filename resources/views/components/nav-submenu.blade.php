@props([
  'id' => null,
  'parentId' => null,
  'items' => [],
  'active' => false,
])
@if(count($items))
  <ul
    class="
      nav-content collapse
      @if($active) show @endif
    "
    @if($id) id="{{ $id }}" @endif
    @if($parentId) data-bs-parent="{{ $parentId }}" @endif
  >

  @foreach($items as $key => $item)
    @if(!\Arr::has($item, 'items'))

      <li>
        <a
          class="@if(\Arr::get($item, 'active')) active @endif "
          href="{{ \Arr::get($item, 'url') }}"
        >
          {!! \Arr::get($item, 'value') !!}
        </a>
      </li>

    @endif
  @endforeach

  </ul>
@endif
