@php
  $selected = $listing->reviews()->orderBy(DB::raw('up_votes - 0.5 * down_votes'), 'desc')->orderBy('created_at', 'desc')->take(2)->get();
  $selected_ids = [];
@endphp

@if ($selected)
  <section class="reviews">
    <header class="anchored">
      <h2>
        Selected Reviews
        <a href="#selected-reviews" name="selected-reviews" title="Heading anchor"></a>
      </h2>
    </header>


    @foreach ($selected as $review)
      @if (!($author = $review->user))
        @continue
      @endif

      @php
        $selected_ids[] = $review->id;
      @endphp

      @include ('listing.review-excerpt')
    @endforeach
  </section>
@endif

@php
  $more   = $listing->reviews()->orderBy('created_at', 'desc')->take(5)->get();
  $latest = [];

  foreach ($more as $review) {
    if (!in_array($review->id, $selected_ids) && $review->user) {
      $latest[] = $review;
      if (count($latest) >= 2) {
        break;
      }
    }
  }
@endphp

@if ($latest)
  <section class="reviews">
    <header class="anchored">
      <h2>
        Latest Reviews
        <a href="#latest-reviews" name="latest-reviews" title="Heading anchor"></a>
      </h2>

    </header>

    @foreach ($latest as $review)
      @include ('listing.review-excerpt')
    @endforeach
  </section>
@endif