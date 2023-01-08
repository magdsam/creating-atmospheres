@if ($navigation)
  <ul class="menu flex h-full flex-col justify-center">
    @foreach ($navigation as $item)
      <li class="menu-item text-[9.5rem] leading-none uppercase {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
        <a href="{{ $item->url }}">
          {!! $item->label !!}
        </a>
      </li>
    @endforeach
  </ul>
@endif
