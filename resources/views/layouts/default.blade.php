<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
  <title>@yield('title', 'Web Fiction Guide')</title>

  <meta name="MobileOptimized" content="width">
  <meta name="HandheldFriendly" content="true">
  <meta name="viewport" content="width=device-width">

  <link rel="stylesheet" href="{{ URL::asset('css/app.css') }}">
  <script src="{{ URL::asset('js/app.js') }}"></script>

  @stack('head_links')
  @stack('head_scripts')
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

    @include('menus.menu-default')

    <main id="main">
      <a name="content"></a>
      <a href="#top" class="visually-hidden visually-hidden--focusable">Back to top</a>
      <div class="content">
        @section('content')
          This is the main content
        @show
      </div>
    </main>
    
    @include('menus.menu-right')
  </div>

</body>
</html>
