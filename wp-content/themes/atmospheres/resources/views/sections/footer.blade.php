<footer class="content-info w-full z-10 border-t border-white">
<div class="content-info__inner flex gap-x-4 gap-y-5 flex-col md:flex-row items-center justify-center md:justify-between px-4 md:px-8 2xl:px-16 py-8 lg:py-12">
    @include('partials/logos')
    <div class="content-info__cta text-center md:text-right order-first md:order-none">
      @hasoption('header-cta')
      @option('header-cta')
      <span class="divider block whitespace-pre">{{ "  |  " }}</span>
      <span class="copyright hidden md:inline-block">© CMSI21. All Rights reserved. {{ date("Y") }}.</span>
      @endoption
    </div>
    <span class="copyright md:hidden">© CMSI21. All Rights reserved. {{ date("Y") }}.</span>
  </div>
</footer>
