<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <meta name="robots" CONTENT="noindex, nofollow">
  <title>@yield('title') | {{ config('app.name') }}</title>
  <link href="{{ asset('css/bootstrap.min.css?v='.config('app.v')) }}" rel="stylesheet">
  <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
  <link href="{{ asset('css/admin.css?v='.config('app.v')) }}" rel="stylesheet">
  <link defer href="https://fonts.googleapis.com/css?family=Catamaran|Bitter:400,700|Signika:400,600" rel="stylesheet">
  @stack('styles')
</head>
<body>

  <div id="app">
    @include('backend.components.nav')

    <main>
      @yield('content')
    </main>
  </div>

  <script src="{{ asset('js/combined.js?v='.config('app.v')) }}"></script>
  {{-- <script src="{{ asset('js/alpine.js?v='.config('app.v')) }}"></script> --}}
  @stack('scripts')
</body>
</html>
