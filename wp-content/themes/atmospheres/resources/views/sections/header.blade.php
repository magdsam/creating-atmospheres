<header class="banner fixed top-0 left-0 w-full">
  <div class="banner__inner flex flex-col md:flex-row justify-between px-8 2xl:px-16 pt-9">
    <div class="banner__logos flex flex-wrap gap-x-4 lg:gap-x-[6.25rem] items-center">
      <div class="banner__logos__logo">
        @svg('images.idk-logo')
      </div>
      <div class="banner__logos__logo">
        @svg('images.fh-joanneum-logo')
      </div>
      <div class="banner__logos__logo">
        @svg('images.esc-logo')
      </div>
      <div class="banner__logos__logo text-xl">
        @svg('images.kunstuni-logo')
      </div>
    </div>
    <div class="banner__cta">
      @hasoption('header-cta')
      @option('header-cta')
      @endoption
    </div>
  </div>
</header>
