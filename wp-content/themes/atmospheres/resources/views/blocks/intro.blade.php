<div class="{{ $block->classes }} pt-60 pb-20 px-8 2xl:px-16">
  <div class="wp-block-intro__inner flex justify-between items-center gap-x-5">
    <div class="wp-block-intro__info wp-block-intro__info--left w-1/4 text-xl font-medium">
      {!! $info_left !!}
    </div>
    <div class="wp-block-intro__logo">
      @svg('images.logo-centered')
    </div>
    <div class="wp-block-intro__info wp-block-intro__info--right w-1/4 text-right text-xl font-medium">
      {!! $info_right !!}
    </div>
  </div>
  @if ($subtitle)
    <div class="wp-block-intro__subtitle text-center uppercase text-5xl mt-6 font-light">
      {{ $subtitle }}
    </div>
  @endif
</div>
