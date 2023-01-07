<article @php(post_class('exhibit p-24'))>
  <div class="exhibit__inner relative">
    <a class="block" href="{{ get_permalink() }}">
    <h2 class="entry-title exhibit__title text-4xl text-center w-full absolute -translate-x-1/2 -translate-y-1/2 left-1/2 top-1/2">
        {!! $title !!}
      </h2>
      <div class="exhibit__image">
        {!! get_the_post_thumbnail() !!}
      </div>
    </a>
  </div>
</article>
