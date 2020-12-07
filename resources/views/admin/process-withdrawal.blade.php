@extends('admin.layout.dashboard')
@section('content')

<div class="w-full max-w-md">

  @if (session('status'))
    <div class=" w-auto on inline-block element pr-16 bg-red-50 text-red-800 text-sm px-4 py-3 mb-3 rounded relative" role="alert">
        <i class="fas fa-check pr-1"></i>
        <strong class="font-bold">{{ session('status') }}aasdsadasdas </strong>
    </div>
  @endif

      @foreach ($processWithdrawal as $userWithdraw)

    <form action="{{ route('transactions.update', $userWithdraw->id) }}" method="POST" enctype="multipart/form-data" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
        @csrf
        @method('PUT')
        <div class="mb-4">
            <h3 class="block mt-4 text-gray-700 text-md font-bold mb-2"> Withdrawal Amount:
                <span class=" text-green-700 text-md font-bold mb-2"> ₦{{ $userWithdraw->amount }} </span>
            </h3>

        </div>

        <div class="mb-4">
          <h3 class="block mt-4 text-gray-700 text-md font-bold mb-2"> Bank Name:
              <span class=" text-black text-md font-bold mb-2"> {{ $userWithdraw->bankDetail->name }} </span>
          </h3>

        </div>

        <div class="mb-4">
          <h3 class="block mt-4 text-gray-700 text-md font-bold mb-2"> Account Name:
              <span class=" text-black text-md font-bold mb-2"> {{ $userWithdraw->bankDetail->account_name }} </span>
          </h3>

        </div>

        <div class="mb-4">
          <h3 class="block mt-4 text-gray-700 text-md font-bold mb-2"> Account No:
              <span class=" text-black text-md font-bold mb-2"> {{ $userWithdraw->bankDetail->account_no }} </span>
          </h3>

        </div>
        {{-- <div class="mb-4">
          <select class="form-select mt-1 block w-full" name="bank">
              <option value="{{ $userWithdraw->status }}" > {{ $userWithdraw->status }}  </option>
               <option value="{{ $userWithdraw->status }}" > {{ $userWithdraw->status }}  </option>
          </select>
        </div> --}}
      @endforeach

      <div class="mb-6 my-10">
        <label class="block text-gray-700 text-sm font-semibold mb-2" for="amount">
          Upload Payment Screenshot
        </label>
        <input class=" form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline"
            type="file"
            id="screenshot"
            name="screenshot"
            required >

        @error('screenshot')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror

      </div>

        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Process
            </button>

        </div>

    </form>

</div>


@endsection
