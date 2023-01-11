@extends('layouts.app')

@section('content')
<div class="students pt-16 md:pt-28">

<h1 class="page-title uppercase text-center md:text-left text-5xl md:text-[5rem] mb-12 px-4 md:px-8 2xl:px-16"><em>S</em>tu<em>de</em>nt<em>s</em></h1>

@if (! have_posts())
<x-alert type="warning">
  {!! __('Sorry, no results were found.', 'sage') !!}
</x-alert>
@endif

@if($students)
  @php($majors = get_terms('ca_students_category'))
  @if ($majors)
  <div class="major-list flex flex-col md:flex-row items-center gap-y-6 gap-x-12 mb-12 text-lg md:text-xl leading-none px-4 md:px-8 2xl:px-16">
    <button class="major-list__item" id="all">
      All ({{count($students)}})
    </button>
      @foreach($majors as $major)
      <button class="major-list__item" id="{{$major->slug}}">
        {{ $major->name . " (" . $major->count . ")"}}
      </button>
      @endforeach
  </div>
  @endif
  <div class="students-list">
    @foreach($students as $student)
    <article class='student px-4 md:px-8 2xl:px-16 has-cat-{{get_the_terms($student, 'ca_students_category')[0]->slug}}' data-cat="{{get_the_terms($student, 'ca_students_category')[0]->slug ? get_the_terms($student, 'ca_students_category')[0]->slug : false}}">
      <a href="{{ get_permalink($student) }}">
      <header class="student__info flex justify-between text-xl md:text-[2rem] py-4 md:py-6">
        <h2 class="student__name">
            {!! get_the_title($student) !!}
          </h2>
          @if (get_the_terms($student, 'ca_students_category')[0]->slug)
          <span class="student__major uppercase">{{ get_the_terms($student, 'ca_students_category')[0]->slug }}</span>
          @endif
        </header>
      </a>
      <div class="student__image hidden lg:block">
        {!! get_the_post_thumbnail($student) !!}
      </div>
    </article>
    @endforeach
  </div>
  @endif


  {!! get_the_posts_navigation() !!}
</div>
@endsection
