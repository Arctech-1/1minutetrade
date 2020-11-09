@extends('layouts.master')

@section('content')


    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">

        @if (session('status'))
        <div class=" w-auto bg-green-400 border border-green-900 text-cool-gray-50 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">{{ session('status') }}</strong>
          </div>
        @endif  

{{-- Withdrawal Link styled as a button --}}
        <div class=" flex flex-row-reverse mt-4 mb-7 ">
            <a href="{{route('bankdetail.create')}}" class=" inline-block bg-purple-900 text-cool-gray-50 px-4 py-3"> Add New Bank Detail </a>
        </div>

        
        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 py-3  rounded-bl-lg rounded-br-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Bank Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Account Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Account Number</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                  
                  @forelse ($bankDetails as $bankDetail)
                       
                    <tr>                   
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex items-center">                  
                                <div>
                                    <div class="text-sm leading-5 text-gray-800">{{ $bankDetail->name }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">{{ $bankDetail->account_name }}</div>
                        </td>

                         
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                          <div class="text-sm leading-5 text-blue-900"> {{ $bankDetail->account_no }}</div>
                           
                        </td>
                    
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                    
                          <a href="{{ route('bankdetail.edit', $bankDetail->id ) }}" class="mr-3 text-sm bg-indigo-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Edit</a>
                          <a href="" class="text-sm bg-red-700 hover:bg-red-900 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">Delete</a>
                        </td>
                            
                    </tr> 
                    @empty
                    @endforelse
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