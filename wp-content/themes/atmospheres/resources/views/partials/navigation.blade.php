@if ($navigation)
  <ul class="menu flex h-full flex-col justify-center relative">
    @foreach ($navigation as $item)
      <li class="menu-item text-7xl md:text-9xl lg:text-[9.5rem] leading-none uppercase {{ $item->classes ?? '' }} {{ $item->active ? 'active' : '' }}">
        <a href="{{ $item->url }}">
          {!! $item->label !!}
        </a>
      </li>
    @endforeach
  </ul>
@endif
