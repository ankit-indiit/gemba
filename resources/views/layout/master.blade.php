<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="csrf-token" content="{{ csrf_token() }}" />
      <title>Gemba</title>
      <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/chosen.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
      <link href="{{ asset('assets/css/responsive.css') }}" rel="stylesheet">
      <link rel="icon" href="img/favicon.png" sizes="16x16" type="image/png">
      <link href="{{ asset('assets/css/toastr.css') }}" rel="stylesheet" />
      <link href="{{ asset('assets/css/sweetalert2.min.css') }}" rel="stylesheet" />
      <script>
        var _baseURL = '{{ url('/') }}';
      </script>
   </head>
   <body>
   
   @include('layout.header')
   
   @yield('content')

   @include('layout.footer')

   <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
   <script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
   <script src="{{ asset('assets/js/chosen.jquery.js') }}"></script>
   <script src="{{ asset('assets/js/main.js') }}"></script>
   <script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>
   <script src="{{ asset('assets/js/custom-script.js') }}"></script>
   <script src="{{ asset('assets/js/toastr.js') }}"></script>
   <script src="{{ asset('assets/js/sweetalert2.all.min.js') }}"></script>
   @yield('customGembaScripts')
   <script>
      $(document).ready(function() {
         toastr.options.timeOut = 10000;
         @if (Session::has('error'))
             toastr.error('{{ Session::get('error') }}');
         @elseif(Session::has('success'))
             toastr.success('{{ Session::get('success') }}');
         @endif

        @if(Session::has('status'))
          toastr.success('{{ Session::get('status') }}');
        @endif
      });
    </script>
</body>
</html>