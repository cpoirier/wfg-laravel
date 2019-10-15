<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>@yield('title', 'Web Fiction Guide')</title>

  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/pure-min.css">
  <link rel="stylesheet" href="https://unpkg.com/purecss@1.0.1/build/grids-responsive-min.css">
  <link rel="stylesheet" href="{{ URL::asset('css/side-menu.css') }}">
  <link rel="stylesheet" href="{{ URL::asset('css/styles.css') }}">

  @stack('head_links')
  @stack('head_scripts');

</head>
<body>
  <p class="skip-link__wrapper">
    <a name="top" class="skip-link visually-hidden visually-hidden--focusable"></a>
    <a href="#main_content" class="skip-link visually-hidden visually-hidden--focusable" id="skip-link">Skip menu</a>
  </p>

  <div id="layout">
    <!-- Menu toggle -->
    <a href="#menu" id="menuLink" class="menu-link">
      <!-- Hamburger icon -->
      <span></span>
    </a>

    <nav id="menu">
      <div class="pure-menu">
        <a class="pure-menu-heading" href="/" title="@yield('title')" rel="home">WFG</a>
        @section('side_panel')
          <ul class="pure-menu-list">
            @stack('menu_items')
          </ul>
        @show
      </div>
    </nav>

    <main id="main">
      <a name="content"></a>
      <div class="content">
        @section('content')
          This is the main content
        @show
      </div>
    </main>
  </div>

</body>
</html>