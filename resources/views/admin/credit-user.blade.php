@extends('admin.layout.dashboard')
@section('content')

<div class="w-full max-w-md">
    
    <form action="{{ route('user.credit', $user->id) }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      @csrf
        <div class="mb-4">
            <h3 class="block mt-4 text-gray-700 text-md font-bold mb-2"> Account Balance:
                <span class=" text-green-700 text-md font-bold mb-2"> ₦ {{ $user->account_balance }} </span>
            </h3>   
                
      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-semibold mb-2" for="amount">
          Credit Amount
        </label>
        <input class=" form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" 
            type="number" 
            id="amount" 
            name="amount" 
            value="{{ old('amount') }}"
            step=".01" min="100.00" max="" placeholder="Enter amount to credit user" required >
        
        @error('amount')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
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