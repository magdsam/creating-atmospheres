<footer class="content-info mb-4 md:mb-12 w-full z-10">
<div class="content-info__inner flex flex-col md:flex-row items-center justify-center md:justify-between px-4 md:px-8 2xl:px-16 pt-9">
    @include('partials/logos')
    <div class="content-info__cta text-center md:text-right order-first md:order-none mb-4 md:mb-0">
      @hasoption('header-cta')
      @option('header-cta')
      @endoption
    </div>
  </div>
</footer>
