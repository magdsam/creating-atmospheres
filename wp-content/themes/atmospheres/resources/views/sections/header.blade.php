<header class="banner fixed top-0 left-0 w-full {{ get_field('show_menu', 'option') ? "z-30" : "z-[5]"}}">
  <div class="banner__inner flex flex-col md:flex-row justify-between px-4 md:px-8 2xl:px-16 pt-9">
  @if(get_field('show_menu', 'option'))
  <div class="w-full justify-end flex text-xl font-medium z-30">
    <button class="menu-button">
      menu
    </button>
  </div>
  @else
    <div class="banner__logos hidden md:block">
      @include('partials/logos')
    </div>
    <div class="banner__cta text-center md:text-right">
      @hasoption('header-cta')
      @option('header-cta')
      @endoption
    </div>
    @endif
  </div>
</header>
@if (has_nav_menu('primary_navigation'))
  <nav class="nav-primary w-full h-screen fixed left-0 top-0 max-h-0 overflow-hidden bg-black z-20" aria-label="{{ wp_get_nav_menu_name('primary_navigation') }}">
    @include('partials.navigation')
  </nav>
@endif
