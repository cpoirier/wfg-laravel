@extends('layouts.default')

@push('menu_items')
  <li class="pure-menu-item"><a href="/start/" class="pure-menu-link">Get Started</a></li>
@endpush

@section('content')

  <article class="listing" about="{{ $listing->title }} by {{ $listing->author_name }}">
    @if ($listing->header_image_url)
      <img class="pure-img" src="{{ $listing->header_image_url }}" alt="header">
    @endif

    <div class="pure-g">
      <section class="listing-blurb pure-u-1 pure-u-md-17-24">
        <div class="space-on-right">
          <header style="border-bottom: 0">
            <h1>{{ $listing->title }}</h1>
            <h2>by {{ $listing->author_name }}</h2>
          </header>

          @section('blurb')
            @if ($listing->tagline)
              <h3>{{ $listing->tagline }}</h3>
            @endif

            @markdown ($listing->blurb)

            <p class="center">
              @foreach (array_unique(array_filter(["Home Page" => $listing->story_home_url, "Start Reading" => $listing->first_page_url])) as $type => $url)
                @if (!$loop->first)
                  |
                @endif

                <a href="{{ $url }}" title="{{ $type }}">{{ $type }}</a>
              @endforeach
            </p>
          @show
        </div>
      </section>

      <section class="pure-u-1 pure-u-md-7-24 meta">
        <p><b>Votes:</b> {{$listing->up_votes}} ▲ {{$listing->down_votes}} ▽ </p>
        <p><b>Listed:</b> {{ $listing->created_at->format('F d, Y') }}</p>
        <p><b>Status:</b> {{ $listing->status }}</p>

        @if ($advisories = $listing->advisories)
          <p class="no-space-below"><b>Advisories:</b></p>
          <ul class="no-space-above">
            @foreach ($advisories as $type => $level)
              <li>{{ $level }} {{ $type }}</li>
            @endforeach
          </ul>
        @endif

        <p class="no-space-below"><b>Tags:</b></p>
        <ul class="no-space-above">
          @foreach ($listing->tags()->orderBy('count')->orderBy('name')->get() as $tag)
            <li><a href="/{{ $tag->slug }}">{{ $tag->name }}</a> ({{ $tag->count }})</a></li>
          @endforeach
        </ul>

      </section>
    </div>
  </article>

  @include('listing.review-section')

@endsection