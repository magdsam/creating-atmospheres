<div class="{{ $block->classes }} pt-24 md:pt-60 pb-14 md:pb-20 px-4 md:px-8 2xl:px-16">
  <div class="wp-block-intro__inner flex flex-col gap-y-6 lg:flex-row justify-between items-center gap-x-5">
    <div class="wp-block-intro__subtitl lg:hidden text-center uppercase text-2xl">
      {{ $subtitle }}
    </div>
    <div class="wp-block-intro__info wp-block-intro__info--left lg:w-1/4 text-center  lg:text-left text-base md:text-xl lg:text-base xl:text-xl font-medium">
      {!! $info_left !!}
    </div>
    <div class="wp-block-intro__logo order-first lg:order-none">
      @svg('images.logo-centered', ['class' => 'w-full md:w-[30rem] lg:w-[35rem] xl:w-[51rem]'])
    </div>
    <div class="wp-block-intro__info wp-block-intro__info--right lg:w-1/4 text-center lg:text-right text-base md:text-xl lg:text-base xl:text-xl font-medium">
      {!! $info_right !!}
    </div>
  </div>
  @if ($subtitle)
    <div class="wp-block-intro__subtitle hidden lg:block text-center uppercase text-5xl mt-6 font-light">
      {{ $subtitle }}
    </div>
  @endif
</div>
