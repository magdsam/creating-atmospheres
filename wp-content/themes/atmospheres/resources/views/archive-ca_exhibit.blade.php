@extends('layouts.app')

@section('content')

  @if (! have_posts())
    <x-alert type="warning">
      {!! __('Sorry, no results were found.', 'sage') !!}
    </x-alert>

    {!! get_search_form(false) !!}
  @endif

  <div class="exhibits-container">
    <h1 class="exhibits__title uppercase absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 text-[5rem]"><em>E</em>xhi<em>b</em>it<em>s</em></h1>
    <div class="exhibits grid">
      @while(have_posts()) @php(the_post())
      @includeFirst(['partials.content-' . get_post_type(), 'partials.content'])
      @endwhile
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

  {!! get_the_posts_navigation() !!}
@endsection

