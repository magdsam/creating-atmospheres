<header class="banner fixed top-0 left-0 w-full z-[5]">
  <div class="banner__inner flex flex-col md:flex-row justify-between px-8 2xl:px-16 pt-9">
    @include('partials/logos')
    <div class="banner__cta">
      @hasoption('header-cta')
      @option('header-cta')
      @endoption
    </div>
  </div>
</header>
