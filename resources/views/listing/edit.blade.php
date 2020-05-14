@extends('layouts.default')

@section('content')
<div class="pure-g">
  <div class="pure-u-1-2 wfg-editing-column">
    <h4 class="display-4">Submission Queue</h4> 

    <ul>
    <li>At present, it takes about <strong>a month</strong> for us to get to new submissions.</li>
    <li>Keep track of where your submission stands with our <a href="http://submissions.webfictionguide.com/">submission queue</a> page.</li>
    </ul>

    <h5>Guidelines, The Short Version (read these!)</h5>

    <ul>
    <li>We list original ongoing and complete web-based novels, serials, and story collections. Don&#8217;t send us your ebooks. We don&#8217;t want them. </li>
    <li>Give us the link to the first page of your story (or the table of contents, for collections). Don&#8217;t make us go looking.</li>
    <li>Don&#8217;t submit before there is something for us to read. We don&#8217;t list hopes and dreams.</li>
    <li>Use proper casing on your title. ALL CAPS is an instant rejection.</li>
    <li>Make sure we can &#8220;turn the page&#8221; all the way through your novel. Bad navigation won&#8217;t fly.</li>
    <li>Give us a description you want our readers to see. You may only get one chance to get their attention. </li>
    <li>Don&#8217;t include review quotes or other editorializing in your description. That&#8217;s for us and our members to do.</li>
    <li>Remember always that this site is run by volunteers. Be nice, be patient, or <a href="http://forums.webfictionguide.com/topic/new-rule">be gone</a>.</li>
    </ul>

    <h5>The Long Version</h5>

    <p>We list story-oriented online fiction of <strong>almost any genre</strong>, including novels, short story collections, and serials. We do not list things that are intended primarily as erotica, but we do list stories that include sexual content in the service of the story.</p>

    <p><strong>Note:</strong> we do not list stories on large sites like FictionPress or Authonomy, as they have their own very extensive communities, and we really can&#8217;t handle the volume. We no longer list stories hosted <strong>solely</strong> on smashwords.com or other ebook publishers, as we are interested in web fiction, not ebooks. It is fine to <strong>additionally</strong> publish an ebook somewhere, of course, but we want the version intended for your web readers.</p>

    <p>If you write a story you&#8217;d like listed, or know of one you think we should list, fill in the form on this page and we&#8217;ll check it out.</p>

    <h6>Sister Sites</h6>

    <p>Listed novels that are either complete or are ongoing with a reasonable hope of completion will also appear on our simplified, consumer-oriented <a href="http://novelsonline.info">online novels portal</a>. All listings qualify for voting on our sister site, <a href="http://topwebfiction.com">topwebfiction.com</a>.</p>

    <div class="hsep"></div>

    <h6>A note on Minimum Standards</h6>

    <p>We will not list stories or collections that lack basic navigation. Generally speaking, there must be a link at the bottom of each page to take the reader to the next page of the story. It is preferable that this link appear immediately after the text. For short story collections, we will accept a proper table of contents, either on a page by itself, or on a sidebar of every page of the listed story. Please note that we list stories, not websites&#8212;we may reject listings that mix non-story content into the page flow of the story.</p>

    <p>If you are unsure of how to set this up on your site, please <a href="&#x6d;a&#x69;&#108;t&#x6f;:&#115;&#x75;&#98;&#x6d;i&#115;&#115;&#105;&#x6f;&#110;&#115;&#64;&#x77;eb&#102;i&#x63;t&#105;&#x6f;&#x6e;&#103;&#117;&#x69;&#100;&#x65;&#46;&#x63;&#x6f;&#109;">contact us</a> and we&#8217;ll do our best to help.</p>

    <div class="hsep"></div>

    <h6>Make sure there is something for us to read</h6>

    <p>We generally require a minimum of 4000 words or 3 regular installments to be available before we will consider a new story or collection for listing. We will <em>never</em> list a story or collection before posting has begun, period. We set these policies primarily to give our readers something to look at, but also so we can make an informed decision on whether or not to list your work. That all said, we do occasionally relax our requirements for authors who have a track record and an audience with us.</p>

    <div class="hsep"></div>

    <h6>Final Points</h6>

    <p>The editorial board of the Guide has the final word on what to list and what not to list. If we think it belongs in our listings, we&#8217;ll list it.</p>

    <p>Any description text you provide for our use on a listing remains your property, and we will remove it at your request. If you are the author of a work we list, please do <a href="m&#97;&#105;l&#116;&#x6f;:&#115;&#117;&#x62;&#x6d;&#x69;&#115;&#115;&#105;&#x6f;n&#x73;&#64;&#119;&#101;&#98;&#x66;&#105;&#x63;&#116;&#x69;&#111;&#110;&#103;&#x75;&#105;&#100;&#101;&#x2e;&#x63;&#111;&#109;">contact us</a> if you would like changes made.</p>

    <p>Finally, bear in mind that we run a directory of websites, similar to <a href="http://dir.yahoo.com/">Yahoo</a> or <a href="http://www.dmoz.org/">DMOZ</a>. While we will do our best to accommodate author requests with respect to our listings, ultimately, we will do what we feel is necessary to keep the listings accurate and up-to-date. And we do not delete listings. See our <a href="/about/legal-stuff/">legal stuff page</a> for more information.</p>
  </div>
  <div class="pure-u-1-2 wfg-editing-column">
    <h4 class="display-4">New Submission</h4>
    <div>
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form method="post" action="{{ route('listing.store') }}">
            @csrf
            <div class="form-group">    
                <label for="title">Title:</label>
                <input type="text" class="form-control" name="title"/>
                <span class="form-note"></span>
            </div>
            <div class="form-group">
                <label for="author_name">Author Name:</label>
                <input type="text" class="form-control" name="author_name"/>
                <span class="form-note"></span>
            </div>
            <div class="form-group">
                <label for="slug">Slug:</label>
                <input type="text" class="form-control" name="slug"/>
                <span class="form-note"></span>
            </div>
            <div class="form-group">
                <label for="tagline">Tagline:</label>
                <input type="text" class="form-control" name="tagline"/>
                <span class="form-note"></span>
            </div>
            <div class="form-group">
                <label for="blurb">Blurb:</label>
                <input type="text" class="form-control" name="blurb"/>
                <span class="form-note"></span>
            </div>
            <div class="form-group">
                <label for="status">Status:</label>
                <input type="text" class="form-control" name="status"/>
                <span class="form-note"></span>
            </div>
            <div class="form-group">
                <label for="story_home_url">Story Home URL:</label>
                <input type="text" class="form-control" name="story_home_url"/>
                <span class="form-note"></span>
            </div>
            <div class="form-group">
                <label for="first_page_url">First Page URL:</label>
                <input type="text" class="form-control" name="first_page_url"/>
                <span class="form-note"></span>
            </div>                         
            <button type="submit" class="pure-button">Submit</button>
        </form>
    </div>
  </div>
</div>
@endsection