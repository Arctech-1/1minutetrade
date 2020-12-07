@extends('layouts.master')
@section('content')

        @if (session('status'))
            <div class=" w-auto on inline-block element pr-16 bg-green-50 text-green-800 text-sm px-4 py-3 rounded relative" role="alert">
                <i class="fas fa-check pr-1"></i>
                <strong class="font-bold">{{ session('status') }} </strong>
            </div>
        @endif


<div class="md:grid md:grid-cols-3 md:gap-6 ">
    <div class="md:col-span-1">
    <!-- component -->
<!-- eslint-disable -->

<div class=" bg-gray-50 my-5 pb-6 w-full justify-center items-center overflow-hidden md:max-w-sm rounded-lg shadow-sm mx-auto">
    <div class="relative h-20">

    </div>

    <div class="relative shadow mx-auto h-24 w-24 -my-12 border-white rounded-full overflow-hidden border-4">
        <img class="object-cover w-full h-full" src="{{ asset('images/profile') }}/{{$profile->profile_photo_path }}">
    </div>
    <div class="mt-16">
        <h1 class="text-lg text-center font-semibold">
        {{ $profile->name }}
        </h1>
        <p class="text-sm text-gray-600 text-center">
        {{ $profile->email }}
        </p>
    </div>
    <div class="mt-6 pt-3 flex flex-col mx-6 border-t">
        <div class="text-xs mr-2 my-1 capitalize tracking-wider px-2 text-black">
        Balance: ₦{{ $profile->account_balance }}
        </div>
        <div class="text-xs mr-2 my-1 capitalize tracking-wider px-2 text-black ">
        Date: {{ $profile->created_at }}
        </div>
        <div class=" text-xs mr-2 my-1 capitalize tracking-wider px-2 text-black ">
        Withdrawals: {{ $profile->transactions()->where('type', 'withrawal')->count() }}
        </div>
        <div class=" text-xs mr-2 my-1 capitalize tracking-wider px-2 text-black ">
        Bank Details: {{ $profile->bankDetails()->count() }}
        </div>

    </div>
    </div>
    <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
    <a href="{{route('password.request')}}" class="py-2 px-10 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
        Change Password
    </a>
    </div>
</div>

<div class="mt-5 md:mt-0 md:col-span-2 py-5">
    <form action=" {{route('profile.update', Auth::user()->id)}} " method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="shadow overflow-hidden sm:rounded-md">
        <div class="px-4 py-5 bg-white sm:p-6">
            <div class="grid grid-cols-6 gap-8">
            <div class="col-span-6 sm:col-span-6">
                <label for="first_name" class="block text-sm font-medium leading-5 text-gray-700">Full name</label>
                <input id="name" name="name" value="{{ $profile->name }}" class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                @error('name')
                <p class="text-red-500 text-xs italic">  {{$message}} </p>
                @enderror
            </div>

            {{-- <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium leading-5 text-gray-700">Last name</label>
                <input id="last_name" class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
            </div> --}}

            <div class="col-span-6 sm:col-span-6">
                <label for="email_address" class="block text-sm font-medium leading-5 text-gray-700">Email address</label>
                <input id="email_address" name= "email" value="{{ $profile->email }}" class="mt-1 form-input block w-full transition duration-150 ease-in-out sm:text-sm sm:leading-5">
                @error('email')
                <p class="text-red-500 text-xs italic">  {{$message}} </p>
                @enderror
            </div>

            <div class="col-span-6">
                <div class="mt-6">
                    <label class="block text-sm leading-5 font-medium text-gray-700">
                        Profile Image (<span class=" text-xs"> Optional </span>)
                    </label>
                    <div class="mt-2 flex items-center">
                        <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">
                            {{-- <img class="object-cover w-full h-full text-gray-300" fill="currentColor" viewBox="0 0 24 24"" src="{{ asset('images') }}/{{$profile->profile_photo_path }}"> --}}
                        <svg class="h-full w-full text-gray-300" fill="currentColor" viewBox="0 0 24 24">
                            <path d="M24 20.993V24H0v-2.996A14.977 14.977 0 0112.004 15c4.904 0 9.26 2.354 11.996 5.993zM16.002 8.999a4 4 0 11-8 0 4 4 0 018 0z" />
                        </svg>
                        </span>
                        <span class="ml-5 rounded-md shadow-sm">
                        <input type="file" name="profile_photo_path" class="py-2 px-3 border border-gray-300 rounded-md text-sm leading-4 font-medium text-gray-700 hover:text-gray-500 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-50 active:text-gray-800 transition duration-150 ease-in-out">
                        </input>
                        <span class=" text-xs m-3"> File type: jpg, jpeg, png </span>
                        </span>
                        @error('profile_photo_path')
                        <p class="text-red-500 text-xs italic">  {{$message}} </p>
                        @enderror
                    </div>
                </div>
            </div>

            </div>
        </div>
        <div class="px-4 py-3 bg-gray-50 text-right sm:px-6">
            <button type="submit" class="py-2 px-10 border border-transparent text-sm leading-5 font-medium rounded-md text-white bg-indigo-600 shadow-sm hover:bg-indigo-500 focus:outline-none focus:shadow-outline-blue active:bg-indigo-600 transition duration-150 ease-in-out">
            Save
            </button>
        </div>
        </div>
    </form>
    </div>


</div>


@endsection
