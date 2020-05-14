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
    <div id="layout">
        <main id="main">
            @yield('content')
        </main>
    </div>
</body>
</html>
