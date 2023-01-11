<header class="banner w-full {{ get_field('show_menu', 'option') ? 'z-40' : 'z-[5]' }}">
  <div class="banner__inner flex flex-col lg:flex-row justify-between px-4 md:px-8 2xl:px-16 pt-9">
  @if(get_field('show_menu', 'option'))
  <div class="w-full justify-between flex text-xl font-medium z-30">
    <a class="brand flex flex-col justify-center" href="{{ home_url('/') }}">
      @svg('images.logo', 'w-[14rem] md:w-[22rem]')
    </a>
    <button class="menu-button leading-none flex">
      menu
    </button>
  </div>
  @else
    <div class="banner__logos hidden lg:block">
      @include('partials/logos')
    </div>
    <div class="banner__cta text-center lg:text-right">
      @hasoption('header-cta')
      @option('header-cta')
      @endoption
    </div>
    @endif
  </div>
</header>
@if (has_nav_menu('primary_navigation'))
  <nav class="nav-primary w-full h-screen fixed left-0 top-0 max-h-0 overflow-hidden bg-black z-20" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
    <div class="nav__inner relative w-full h-screen">
      @include('partials.navigation')
      @hasoption('menu_info')
      <div class="nav-info text-center lg:text-left md:absolute md:right-4 md:bottom-4 lg:right-12 lg:bottom-12 xl:right-24 lxl:bottom-16 text-base xl:text-xl">
        @option('menu_info')
        <div class="flex items-center gap-x-1 mt-6 xl:mt-10 justify-center lg:justify-start">@svg('images.icon-instagram') <p>follow us on instagram <a target="_blank" href="https://www.instagram.com/cmsbycms/">@cmsbycms</a></p></div>
      </div>
      @endoption
    </div>
  </nav>
@endif
