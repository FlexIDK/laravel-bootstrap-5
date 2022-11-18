@php
use \Illuminate\Support;

$replace = [
    '\\' => '\\\\',
    '\'' => '\\\'',
];

$attributes = $attributes
    ->class([
        //
    ])
    ->merge([
        'aria-label' => 'breadcrumb',

        ...(is_null($divider) ? [] : [
            'style' => "--bs-breadcrumb-divider: '" .
                str_replace(
                    array_keys($replace),
                    array_values($replace),
                    Support\Str::limit($divider, 1, '')
                ) .
                "';"
        ]),
    ])
;

@endphp

<nav
  {{ $attributes }}
>
  <ol class="breadcrumb">
    @foreach($items as $item)
    <li
      @if ($item['active'])
        class="breadcrumb-item active"
        aria-current="page"
      @else
        class="breadcrumb-item"
      @endif
    >
      @if ($item['href'] && !$item['active'])
      <a href="{{ $item['href'] }}">
        {{ $item['name'] }}</a>
      @else
        {{ $item['name'] }}
      @endif
    </li>
    @endforeach
  </ol>
</nav>
