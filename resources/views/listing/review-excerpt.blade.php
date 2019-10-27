@php
  if (!($author = $review->user)) {
    return;
  }
@endphp

<article class="inline-review">
  <header class="pure-g">
    <div class="pure-u-2-24 pure-u-md-2-24">
      <img class="pure-img" src="{{ $author->gravatar }}" class="gravatar" alt="gravatar">
    </div>

    <div class="pure-u-1-24"></div>

    <div class="pure-u-21-24 pure-u-md-13-24">
      @if ($review->title)
      <h3>{{$review->title}}</h3>
      @endif
      <h4>
        @if ($listing = $author->listings()->orderBy('created_at', 'desc')->first())
          by {{$author->name}}, author of <a href="{{ route('listing', [$listing->slug]) }}">{{ $listing->title }}</a>
        @else
          by {{$author->name}}
        @endif
        <br>
        {{$review->created_at->format('F d, Y')}}
      </h4>
    </div>
  </header>

  <div class="pure-g">
    <div class="pure-u-2-24 quote-mark">&rdquo;</div>
    <div class="pure-u-1-24"></div>
    <div class="pure-u-21-24 pure-u-md-13-24">
      @if ($review->pull_quote)
        @markdown ($review->pull_quote)
      @else
        @markdown ($review->excerpt)
      @endif
    </div>
    <div class="pure-u-1-24"></div>
    <div class="pure-u-1 pure-u-md-7-24">
      <p>
        Helpfulness: {{$review->up_votes}} ▲ {{$review->down_votes}} ▽
        <br>
        <a href="#">read the full review...</a>
      </p>
    </div>
  </div>
</article>
