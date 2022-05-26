<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <title>Gemba</title>
      <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="https://harvesthq.github.io/chosen/chosen.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
      <link rel="icon" href="img/favicon.png" sizes="16x16" type="image/png">
   </head>
   <body>
   
   @include('layout.header')
   
   @yield('content')

   @include('layout.footer')

   <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
   <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
   <script src="https://harvesthq.github.io/chosen/chosen.jquery.js') }}"></script>
   <script src="{{ asset('assets/js/main.js') }}"></script>
</body>
</html>