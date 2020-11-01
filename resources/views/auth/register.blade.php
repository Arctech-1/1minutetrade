@extends('layouts.authapp')

@section('content')
    

<body class="body-bg min-h-screen pt-12 md:pt-20 pb-6 px-2 md:px-0" style="font-family:Raleway, Lato,sans-serif;">
    <header class="max-w-lg mx-auto">
        <a href="#">
            <h1 class="text-4xl font-bold text-white text-center">1Minute Trade</h1>
        </a>
    </header>

    <main class="bg-white max-w-lg mx-auto p-8 md:p-12 my-10 rounded-lg shadow-2xl">
        <section>
            <h3 class="font-bold text-2xl">Welcome to 1Minute Trade</h3>
            <p class="text-gray-600 pt-2">Registeration</p>
        </section>

        <section class="mt-10">

            <form class="flex flex-col" method="POST" action="{{ route('register') }}">
                @csrf

                
                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="name">{{ __('Name') }} </label>
                    <input type="text" id="name" name="name" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3  @error('name') border-red-500 @enderror" value="{{ old('name') }}"  required autocomplete="name" autofocus>
                    @error('name')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>


                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="email">{{ __('E-Mail Address') }} </label>
                    <input type="email" id="email" name="email" class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3  @error('email') border-red-500 @enderror" value="{{ old('email') }}"  required autocomplete="email" autofocus>
                    @error('email')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">{{ __('Password') }}</label>
                    <input type="password" name="password" id="password" 
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3 
                    @error('password') border-red-500 @enderror" required autocomplete="new-password">
                    
                    @error('password')
                    <p class="text-red-500 text-xs italic mt-4">
                        {{ $message }}
                    </p>
                    @enderror
                </div>
               

                <div class="mb-6 pt-3 rounded bg-gray-200">
                    <label class="block text-gray-700 text-sm font-bold mb-2 ml-3" for="password">{{ __('Confirm Password') }}</label>
                    <input type="password" name="password_confirmation" id="password-confirm" 
                    class="bg-gray-200 rounded w-full text-gray-700 focus:outline-none border-b-4 border-gray-300 focus:border-purple-600 transition duration-500 px-3 pb-3 " required autocomplete="new-password">
                </div>
    
                <button class="bg-purple-900 hover:bg-purple-700 text-white font-bold py-2 rounded shadow-lg hover:shadow-xl transition duration-200" type="submit"> {{ __('Register') }} </button>
            </form>

        </section>
    </main>


    <div class="max-w-lg mx-auto text-center mt-12 mb-6">
        <p class="text-white">{{ __("Already have an account ?") }} <a href="{{ route('login') }}" class="font-bold hover:underline">{{ __('Login') }}</a></p>
    </div>
   
   
@endsection
  
