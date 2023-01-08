@extends('layouts.app')

@section('content')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  @if ($exhibits)
  <div class="exhibits-container">
    <h1 class="exhibits__title uppercase absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[5rem]"><em>E</em>xhi<em>b</em>it<em>s</em></h1>
    <div class="exhibits absolute grid gap-4 lg:gap-12" style="grid-template-columns: repeat({{ round(sqrt(count($exhibits))) }}, minmax(0, 1fr)); min-width: calc({{round(sqrt(count($exhibits)))}} * 45vw)">
      @foreach($exhibits as $exhibit)
      @if(floor(count($exhibits)/2) == $loop->index)
      <div class="blank-space"></div>
      @endif
      @php
        if (rand(1, 3) == 1) {
          $randomItems = 'items-start';
        } elseif (rand(1, 3) == 2) {
          $randomItems = 'items-center';
        } else {
          $randomItems = 'items-end';
        }
      @endphp
      <article class="exhibit flex justify-center {{$randomItems}} order-{{$exhibit->menu_order != 0 ? $exhibit->menu_order : 'none' }}">
        <div class="exhibit__inner relative" style="transform: translateX({{ rand(-10, 10) . '%' }}) translateY({{ rand(-25, 25) . '%' }})">
          <a class="block" href="{{ get_permalink($exhibit) }}">
          <div class="exhibit__infos flex justify-between absolute w-full -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
            <h2 class="exhibit__title leading-tight text-4xl text-center w-full">
              <span class="exhibit__count font-serif font-bold">{{sprintf("%02d", $exhibit->menu_order)}}</span>
                {!! get_the_title($exhibit) !!}
            </h2>
            @if (get_the_terms($exhibit, 'ca_exhibits_category'))
              <span class="exhibit__area uppercase">{{ get_the_terms($exhibit, 'ca_exhibits_category')[0]->slug }}</span>
            @endif
          </div>
            <div class="exhibit__image">
              @if(get_the_post_thumbnail($exhibit))
              {!! get_the_post_thumbnail($exhibit) !!}
              @endif
            </div>
          </a>
        </div>
      </article>
      @endforeach
    </div>
    <div class="switches fixed -translate-x-1/2 left-1/2 bottom-8 flex bg-white text-black text-xl font-medium">
      <button id="switch-grid" class="switch switch--grid is-active">
        <span>@svg('images.grid-icon', 'fill-black')</span>
        <span>Grid</span>
      </button>
      <button id="switch-list" class="switch switch--list">
        <span>@svg('images.list-icon', 'fill-black')</span>
        <span>List</span>
      </button>
    </div>
  </div>
  @endif

  {!! get_the_posts_navigation() !!}
@endsection

