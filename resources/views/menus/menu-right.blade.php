@switch(request()->route()->getName())
  @case("listing")
    <details id="rightinfo" open>
      <summary>Author Options</summary>
      <div class="pure-menu">
        <ul class="pure-menu-list">
          <li class="pure-menu-item"><a href="/listings/edit" class="pure-menu-link">edit listing</a></li>
          <li class="pure-menu-item"><a href="#" class="pure-menu-link">change header</a></li>
          <li class="pure-menu-item"><a href="#" class="pure-menu-link">reset votes</a></li>
          <li class="pure-menu-item"><a href="#" class="pure-menu-link">change status</a></li>
        </ul>
      </div>
    </details>
    @break
  @default
    <div id="rightinfo">
      <summary></summary>
    </div>
@endswitch