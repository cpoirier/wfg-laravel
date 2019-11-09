@extends('layouts.app')
@section('title')
    Web Fiction Guide - Top Web Fiction
@endsection
@section('content')
<div class="pure-g wfg-home-wrapper">
  <div class="wfg-home-left"><a href="/listings">Listings</a></div>
  <div class="wfg-home-content">
  
    @foreach( $listings as $listing )
      <div class="wfg-top-block">
        <div class="wfg-top-block-info">
          <span class="wfg-top-block-id hidden">{{$listing->id}}</span>
          <a href="{{$listing->story_home_url}}">
            <span class="wfg-top-block-title">{{$listing->title}}</span>
            <span class="wfg-top-block-author">by {{$listing->author_name}}</span>
          </a>
        </div>
        <div class="wfg-top-block-voting">
          <voting-component
            up_votes="{{ $listing->up_votes }}"
            down_votes="{{ $listing->down_votes }}"
          ></voting-component>
        </div>
        <a class="wfg-top-block-banner" href="{{$listing->story_home_url}}">
        </a>
      </div>
    @endforeach

  </div>
  <div class="wfg-home-right"></div>
</div>
@endsection
