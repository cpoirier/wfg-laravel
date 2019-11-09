@extends('layouts.default')

@section('content')

<div class="pure-g">
  <div class="pure-u-1-1 wfg-pagination-top">
    <span class="wfg-pagination-links">{{ $listings->links() }}</span>
  </div>
  <div id="listings-content" class="pure-u-1-1">
    <div id="top-listings-carousel" class="carousel slide wfg-text-carousel" data-ride="carousel">
      <div id="wfg-carousel-block" class="carousel-inner" role="listbox">
        @foreach( $listings as $listing )
          <div class="carousel-item {{ $loop->first ? ' active' : '' }}" >
            <span class="wfg-carousel-block-id hidden">{{$listing->id}}</span>
            <div class="wfg-carousel-block-title">
              <a href="/listings/{{ $listing->slug }}">{{$listing->title}}</a>
              <span class="wfg-carousel-block-author">by {{$listing->author_name}}</span>
              <span class="wfg-carousel-block-status"> - {{$listing->status}}</span>
            </div>
            <span class="wfg-carousel-block-blurb">
            @php
              echo substr(strip_tags($listing->blurb), 0, 450);
            @endphp
            </span>
            @php
              $cBlurb = $listing->blurb;
              if(strlen($cBlurb) > 450) {
                echo "<span class='wfg_carousel-read-more'><a href='./listings/" . $listing->slug . "'>[more . . .]</a>";
              }
            @endphp
            <div class="wfg-carousel-block-home"><a href="{{$listing->story_home_url}}">Read Now</a></div>
          </div>
        @endforeach
      </div>
      <a class="carousel-control-prev" href="#top-listings-carousel" data-slide="prev">
          <span class="carousel-control-prev-icon"></span>
      </a>
      <a class="carousel-control-next" href="#top-listings-carousel" data-slide="next">
          <span class="carousel-control-next-icon"></span>
      </a>
      <ol class="carousel-indicators">
        @foreach( $listings as $listing )
          <li data-target="#top-listings-carousel" data-slide-to="{{ $loop->index }}" class="{{ $loop->first ? 'active' : '' }}"></li>
        @endforeach
      </ol>
    </div>
  </div>
  <div class="pure-u-1-1 wfg-pagination-bottom">
    <span class="wfg-pagination-links">{{ $listings->links() }}</span>
  </div>
</div>
@endsection
