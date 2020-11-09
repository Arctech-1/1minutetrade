@extends('layouts.master')
@section('content')

<div class="w-full max-w-md">
    
    <form action="" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      @csrf
        <div class="mb-4">
           
       
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">
          Withdrawal Amount
        </label>
        <input class=" form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="number" id="amount" name="amount" step=".01" min="1" max="" placeholder="" >
        
        @error('amount')
            <p class="text-red-500 text-xs italic"></p>
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