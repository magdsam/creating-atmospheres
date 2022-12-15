<header class="banner">
  <div class="banner__inner flex justify-between px-8 2xl:px-16 pt-9">
    <div class="banner__logos flex gap-x-[6.25rem] items-center">
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
