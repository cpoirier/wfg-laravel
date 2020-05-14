@extends('layouts.default')

@push('menu_items')
  <li class="pure-menu-item"><a href="/start/" class="pure-menu-link">Start Reading</a></li>
@endpush

@section('content')

  <article class="listing" about="{{ $listing->title }} by {{ $listing->author_name }}">
    <header>
      @if ($listing->header_image_url)
        <img class="pure-img" src="{{ $listing->header_image_url }}" alt="header">
        <h1>{{ $listing->title }} <span class="byline">by {{ $listing->author_name }}</span></h1>
      @endif
    </header>

    <div class="pure-g">
      <div class="listing-blurb pure-u-1 pure-u-md-16-24">
        @section('blurb')
          @if ($listing->tagline)
            <p><strong>{{ $listing->tagline }}</strong></p>
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

      <div class="pure-u-1 pure-u-md-1-24">
      </div>

      <div class="pure-u-1 pure-u-md-7-24 meta">
        <voting-component
          up_votes="{{ $listing->up_votes }}"
          down_votes="{{ $listing->down_votes }}"
        ></voting-component>
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
      </div>
    </div>
  </article>

  @include('listing.review-section')

@endsection
