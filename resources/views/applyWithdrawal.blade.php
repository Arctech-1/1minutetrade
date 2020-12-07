@extends('layouts.master')
@section('content')

<div class="w-full max-w-md">

    <form action="{{ route('withdraw.submit') }}" method="POST" class="bg-white shadow-md rounded px-8 pt-6 pb-8 mb-4">
      @csrf
        <div class="mb-4">
            <label class="block mt-4">
                <span class="text-gray-700 text-sm font-bold mb-2">Bank Details</span>
            </label>
        @foreach ($bankDetails as $bankDetail)


            <select class="form-select mt-1 block w-full" name="bank">
              @foreach ($bankDetail->bankDetails as $userBank)
                <option value="{{ $userBank->id }}" > {{ $userBank->name }} ({{ $userBank->account_name }}-{{ $userBank->account_no }})  </option>
                @endforeach
              </select>

        @endforeach
            @empty($userBank)
                <p>No bank details available </p>
            @endempty



      </div>
      <div class="mb-6">
        <label class="block text-gray-700 text-sm font-bold mb-2" for="amount">
          Withdrawal Amount
        </label>
        <input class=" form-input shadow appearance-none border rounded w-full py-2 px-3 text-gray-700 mb-3 leading-tight focus:outline-none focus:shadow-outline" type="number" id="amount" name="amount" step=".01"  placeholder="" >

        @error('amount')
            <p class="text-red-500 text-xs italic">{{$message}}</p>
        @enderror


      </div>
      @isset($userBank)
        <div class="flex items-center justify-between">
            <button class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded focus:outline-none focus:shadow-outline" type="submit">
            Submit
            </button>

        </div>
      @endisset


    </form>
  </div>


@endsection
