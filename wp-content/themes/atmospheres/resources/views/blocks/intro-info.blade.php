<div class="{{ $block->classes }} relative">
  @if($video)
  <div class="wp-block-intro-info__video w-full h-full overflow-hidden bg-black rounded-t-full absolute left-0 top-0 z-[-1]">
    <video width="{{ $video['width'] }}" height="{{ $video['height'] }}" class="w-full h-auto blur-xl scale-105" autoplay muted loop playsinline>
      <source src="{{ $video['url'] }}" type="{{$video['mime_type']}}">
    </video>
  </div>
  @endif
  <div class="wp-block-intro-info__content">
    @if ($taglines_1)
    <div class="wp-block-intro-info__taglines wp-block-intro-info__taglines--1">
      @foreach ($taglines_1 as $item)
      <div class="wp-block-intro-info__tagline">{!! $item['tagline'] !!}</div>
      @endforeach
    </div>
    @endif
    @if ($taglines_2)
    <div class="wp-block-intro-info__taglines wp-block-intro-info__taglines--2">
      @foreach ($taglines_2 as $item)
      <div class="wp-block-intro-info__tagline">{!! $item['tagline'] !!}</div>
      @endforeach
    </div>
    @endif
    @if ($countdown_info)
    <div class="wp-block-intro-info__taglines wp-block-intro-info__taglines--countdown">
      <div class="wp-block-intro-info__tagline">
        {!! $countdown_info !!}
      </div>
      <div class="wp-block-intro-info__countdown">
        <div class="wp-block-intro-info__countdown__content flex">
          <div class="wp-block-intro-info__countdown__item days">
            <div class="number">00</div>
            <div class="legend">Days</div>
          </div>
          <div class="wp-block-intro-info__countdown__divider">:</div>
          <div class="wp-block-intro-info__countdown__item hours">
            <div class="number">00</div>
            <div class="legend">Hours</div>
          </div>
          <div class="wp-block-intro-info__countdown__divider">:</div>
          <div class="wp-block-intro-info__countdown__item minutes">
            <div class="number">00</div>
            <div class="legend">Minutes</div>
          </div>
          <div class="wp-block-intro-info__countdown__divider">:</div>
          <div class="wp-block-intro-info__countdown__item seconds">
            <div class="number">00</div>
            <div class="legend">Seconds</div>
          </div>
        </div>
      </div>
    </div>
    @endif
  </div>
</div>
