<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="author" content="{{ config('app.name') }}">
  <meta name="application-name" content="{{ config('app.name') }}">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="theme-color" content="#ff2d20"/>
  <meta name="description" content="@yield('description')">
  <meta name="revised" content="@yield('revised')">
  <meta name="mobile-web-app-capable" content="yes">
  <meta name="apple-mobile-web-app-capable" content="yes">
  <meta name="msapplication-starturl" content="/">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" type="image/x-icon" href="{{ asset('/images/favicon.png') }}">
  <link rel="manifest" href="/manifest.json">
  <title>@yield('title')</title>

  <link rel="dns-prefetch" href="//fonts.googleapis.com">

  <meta itemprop="name" content="@yield('title')">
  <meta itemprop="description" content="@yield('description')">
  <meta itemprop="image" content="@yield('image', '/images/logo.png')">

  <meta property="og:type" content="website">
  <meta property="og:url" content="{{ url()->current() }}">
  <meta property="og:title" content="@yield('title')">
  <meta property="og:description" content="@yield('description')">
  <meta property="og:image" content="@yield('image', '/images/logo.png')">
  <meta property="og:locale" content="{{ app()->getLocale() }}">
  <meta property="og:site_name" content="bestoflaravel.com">

  <meta name="twitter:card" content="summary">
  <meta name="twitter:title" content="@yield('title')">
  <meta name="twitter:description" content="@yield('description')">
  <meta name="twitter:image" content="@yield('image', '/images/logo.png')">

  @if(App::environment(['local', 'staging']))
    <link href="{{ asset('css/tailwind.min.css?v='.config('app.v')) }}" rel="stylesheet">
    <meta name="robots" content="noindex, nofollow" />
    <script>
      window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
      ga('create', 'UA-0000000-0', 'auto');
      ga('send', 'pageview');
    </script>
    <script async src='https://www.google-analytics.com/analytics_debug.js'></script>
  @else
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/1.3.4/tailwind.min.css" crossorigin="anonymous">
    <meta name="robots" content="index, follow" />

    <script>
      window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;
      ga('create', 'UA-00-00', 'auto');
      ga('send', 'pageview');
    </script>
    <script async src='https://www.google-analytics.com/analytics.js'></script>
  @endif

  <link defer href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700|Roboto:400,500,700&display=swap" rel="stylesheet">
  <link href="{{ asset('css/app.css?v='.config('app.v')) }}" rel="stylesheet">
</head>
<body>

  @yield('content')

  @stack('scripts')

</body>
</html>
