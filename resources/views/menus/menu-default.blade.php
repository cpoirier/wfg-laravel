<nav id="menu">
  <div class="pure-menu">
    <a class="pure-menu-heading wfg-menu-heading" href="/" title="@yield('title')" rel="home">WFG</a>
    <span class="wfg-menu-userbar"><a class="wfg-menu-login" href="#">login</a>/<a class="wfg-menu-login" href="#">register</a></span>
    @section('side_panel')
      <ul class="pure-menu-list">
        @stack('menu_items')
        <li class="pure-menu-item"><a href="/listings/" class="pure-menu-link">listings</a></li>
        <li class="pure-menu-item"><a href="/listings/popular/" class="pure-menu-link">popular</a></li>
        <li class="pure-menu-item"><a href="/reviews/" class="pure-menu-link">reviews</a></li>
        <li class="pure-menu-item"><a href="/forums/" class="pure-menu-link">forums</a></li>
        <li class="pure-menu-item"><a href="/about/" class="pure-menu-link">info & submissions</a></li>
      </ul>
    @show
  </div>
</nav>
