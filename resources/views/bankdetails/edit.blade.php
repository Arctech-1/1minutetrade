@extends('layouts.master')
@section('content')

<div class="w-full max-w-md">
    
    <form action="{{route('bankdetail.update', $bankDetail->id)}}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      @csrf
      @method('PUT')
        <div class="mb-4">
               
        </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="account_name">
          Bank Name
        </label>
        <input class="  @error('name') border-red-600  @enderror form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="text" id="name" name="name" value="{{ $bankDetail->name }}">
        
        @error('name')
            <p class="text-red-500 text-xs italic">  {{$message}} </p>
        @enderror

        <label class="block text-gray-700 text-sm font-bold mb-2" for="account_name">
          Account Name
        </label>
        <input class="  @error('account_name') border-red-600  @enderror form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="text" id="account_name" name="account_name" value="{{ $bankDetail->account_name }}" >
        
        @error('account_name')
            <p class="text-red-500 text-xs italic"> {{$message}}</p>
        @enderror

        <label class="block text-gray-700 text-sm font-bold mb-2" for="account_number">
          Account Number
        </label>
        <input class=" @error('account_no') border-red-600  @enderror form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="number" id="account_no" name="account_no" value="{{ $bankDetail->account_no }}" >
        
        @error('account_no')
            <p class="text-red-500 text-xs italic"> {{$message}} </p>
        @enderror
        
      </div>
     
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Submit
            </button>
            
        </div>

      
    
    </form>
  </div>


@endsection