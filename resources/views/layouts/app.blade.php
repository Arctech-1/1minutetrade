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
   
   <style>
        .body-bg {
            background-color: #f7f7f7;
            background-image: linear-gradient(315deg, #f7f7f7 0%, #3E3C54 74%);
        }
    </style>

</head>


@yield('content')

<footer class="max-w-lg mx-auto flex justify-center text-white">
    
</footer>
</body>
</html>