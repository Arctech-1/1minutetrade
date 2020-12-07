<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <!-- CSRF Token -->
   <meta name="csrf-token" content="{{ csrf_token() }}">

   <title>{{ config('app.name', 'Laravel') }}</title>

   <!-- Scripts -->
   <script src="{{ asset('js/app.js') }}" defer></script>

   <!-- Styles -->
   <link href="{{ mix('css/app.css') }}" rel="stylesheet">
    {{-- <link href="https://unpkg.com/tailwindcss/dist/tailwind.min.css" rel="stylesheet"> --}}
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>


   <style>
        .body-bg {
            background-color: #f7f7f7;
            background-image: linear-gradient(315deg, #f7f7f7 0%, #3E3C54 74%);
        }

        @keyframes loader-rotate {
            0% {
                transform: rotate(0);
            }
            100% {
                transform: rotate(360deg);
            }
        }
        .loader {
            border-right-color: transparent;
            animation: loader-rotate 1s linear infinite;

        }
    </style>

</head>
<body class="bg-fixed bg-no-repeat py-10 sm py-10" style="background-image: url('images/mountains-5727541_1920.jpg')">


@yield('content')

    <footer class="max-w-lg mx-auto flex justify-center text-white">

    </footer>

    <script>
    //  var spinner = $('.loader');
    // $(function() {
    //     spinner.show();
    //   $('#resend-verification-form').submit(function() {
    //     //e.preventDefault();
    //     spinner.show();

    //     });

    //   });
    </script>

    <script>
    var spinner = $('.loader');
    $(function() {
        spinner.hide();
      $('form').submit(function() {
        //e.preventDefault();
        spinner.show();
        // $.ajax({
        //   url: "{{ route('register') }}",
        //   data: $(this).serialize(),
        //   //method: 'POST',
        //   type: 'post',
        //   dataType: 'JSON'
        // }).done(function(resp) {
         // spinner.hide();
        });

      });
  //  });
    </script>

</body>
</html>
