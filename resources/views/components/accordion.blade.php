@props([
    /** @var array{title: string, content: string, active: boolean} $@items  */
    'items' => [],
    'flush' => false,
    'alwaysOpen' => false
])
@php
$attributes = $attributes
  ->class([
      'accordion',
      ($flush ? 'accordion-flush' : null),
  ])
  ->merge([
      'id' => $id,
  ]);
@endphp
<div
  {{ $attributes }}
  id="{{ $id }}">

  @foreach($items as $key => $item)
    <div class="accordion-item">
      <h2 class="accordion-header">
        <button class="accordion-button"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target="#{{ $id }}-{{ $key }}">
          @if (is_string($item))
            {{ $item }}
          @else
            {{ $item['title'] ?? 'undefined `title`' }}
          @endif
        </button>
      </h2>

      <div
        id="{{ $id }}-{{ $key }}"
        class="
          accordion-collapse
          collapse
          @if($item['active'] ?? false) show @endif
        "
        @if (!$alwaysOpen) data-bs-parent="#{{ $id }}" @endif
      >
        <div class="accordion-body">
@php
$var = 'content' . $key;
@endphp
          @if (isset(${$var}))
            {{ ${$var} }}
          @else
            {!! $item['content'] ?? 'undefined `content`' !!}
          @endif
        </div>
      </div>
    </div>
  @endforeach
</div>
