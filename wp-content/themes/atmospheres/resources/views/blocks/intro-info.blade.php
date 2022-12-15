<div class="{{ $block->classes }} relative">
  @if($video)
  <div class="wp-block-intro-info__video w-full h-full overflow-hidden rounded-t-full">
    <video width="{{ $video['width'] }}" height="{{ $video['height'] }}" class="w-full h-auto blur-md scale-105" autoplay muted loop playsinline>
      <source src="{{ $video['url'] }}" type="{{$video['mime_type']}}">
    </video>
  </div>
  @endif
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
  <div class="wp-block-intro-info__tagline">
    {!! $countdown_info !!}
  </div>
  @endif
</div>
