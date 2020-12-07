@extends('admin.layout.dashboard')
@section('content')

<div class="w-full max-w-md">
    
    <form action="{{ route('users.store') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      @csrf
        <div class="mb-4">
               
        </div>
      <div class="mb-6">
       
        <label class="block text-gray-700 text-sm font-bold mb-2" for="name">
          Fullname
        </label>
        <input class="  @error('name') border-red-600  @enderror form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="text" id="name" name="name" value="{{ old('name') }}">
        
        @error('name')
            <p class="text-red-500 text-xs italic">  {{$message}} </p>
        @enderror

        <label class="block text-gray-700 text-sm font-bold mb-2" for="email">
          Email
        </label>
        <input class=" @error('email') border-red-600  @enderror form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="email" id="account_name" name="email" value="{{ old('email') }}" >
        
        @error('email')
            <p class="text-red-500 text-xs italic"> {{$message}}</p>
        @enderror

        <label for="password" class="block text-gray-700 text-sm font-bold mb-2">
            {{ __('Password') }}
        </label>

        <input id="password" type="password"
            class="form-input w-full @error('password') border-red-500 @enderror  form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" 
            name="password"
            required autocomplete="new-password">

        @error('password')
        <p class="text-red-500 text-xs italic mt-4">
            {{ $message }}
        </p>
        @enderror

        <label for="password-confirm" class="block text-gray-700 text-sm font-bold mb-2">
            {{ __('Confirm Password') }}
        </label>

        <input id="password-confirm" type="password" class="form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            name="password_confirmation" required autocomplete="new-password">
     
    </div>
     
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Submit
            </button>
            
        </div>

      
    
    </form>
  </div>


@endsection