<article @php(post_class('grid-item p-24 max-w-[50%]'))>
  <div>
    <a href="{{ get_permalink() }}">
    <h2 class="entry-title exhibit">
        {!! $title !!}
      </h2>
      {!! get_the_post_thumbnail() !!}
    </a>
  </div>
</article>
