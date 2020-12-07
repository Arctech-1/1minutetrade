@extends('layouts.master')

@section('content')


    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">

        @if (session('status'))
        <div class=" w-auto on inline-block element pr-16 bg-green-50 text-green-800 text-sm px-4 py-3 rounded relative" role="alert">
            <i class="fas fa-check pr-1"></i>
            <strong class="font-bold">{{ session('status') }} </strong>
        </div>
        @endif

        @if (session('deleteStatus'))
        <div class=" w-auto on inline-block element pr-16 bg-red-50 text-red-800 text-sm px-4 py-3 rounded relative" role="alert">
            <i class="fas fa-check pr-1"></i>
            <strong class="font-bold">{{ session('deleteStatus') }} </strong>
        </div>
        @endif

{{-- Withdrawal Link styled as a button --}}
        <div class=" flex flex-row-reverse mt-4 mb-7 ">
            <a href="{{route('withdraw')}}" class=" inline-block bg-purple-900 hover:bg-purple-700 text-cool-gray-50 px-4 py-3"> Apply New  Withdrawal </a>
        </div>


        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 py-3  rounded-bl-lg rounded-br-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Bank</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Bank Account</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Amount</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Date</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Action</th>
                    </tr>
                </thead>
                <tbody class="bg-white">


                    @foreach ($apply as $bank)
                    @foreach ($bank->transactions as $transaction)
                    <tr>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm leading-5 text-gray-800">{{$bank->name}}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">{{$bank->account_no}}</div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900"> ₦ {{$transaction->amount}}</div>
                        </td>


                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <span class="relative inline-block px-3 py-1 font-semibold text-red-900 leading-tight">
                            <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                            <span class="relative text-xs">{{$transaction->status}}</span>
                        </span>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$transaction->created_at}}</td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">

                            <form action="/apply/delete/?id={{$transaction->id}}" method="post" >
                                @csrf
                                @method('GET')
                              <button type="submit" class="text-sm bg-red-700 hover:bg-red-900 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                  <i class="fas fa-trash px-1"></i>
                                  Delete
                              </button>
                            </form>

                          </td>
                    </tr>
                    @endforeach
                    @empty($bank)
                         <tr>
                            <div class="py-5"> No Withrawal Request  </div>
                        </tr>
                    @endempty
                    @endforeach
                    @empty($transaction)
                        <tr>
                            <div class="py-5"> No Withrawal Request  </div>
                        </tr>
                    @endempty


                </tbody>
            </table>
        <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
            <div>

            </div>
            <div>
            <nav class="relative z-0 inline-flex shadow-sm">
                {{-- <div>
                    {{ $incomeHistory->links() }}
                </div> --}}

            </nav>
            </div>
        </div>

        </div>
    </div>
@endsection
