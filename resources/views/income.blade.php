@extends('layouts.master')

@section('content')

    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
        
        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 py-3  rounded-bl-lg rounded-br-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Credit</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Balance</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Created Date</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($incomeHistory as $income)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm leading-5 text-gray-800">₦{{$income->amount}}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">₦{{Auth::user()->account_balance}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$income->created_at}}</td>
                    </tr>     
                    @empty
                    <tr>
                        <div> No data available </div>
                    </tr>         
                    
                    @endforelse
                             
                </tbody>
            </table>
        <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
            <div>
            
            </div>
            <div>
            <nav class="relative z-0 inline-flex shadow-sm">
                <div>
                    {{ $incomeHistory->links() }}
                </div>
                
            </nav>
            </div>
        </div>
        
        </div>
    </div>
@endsection