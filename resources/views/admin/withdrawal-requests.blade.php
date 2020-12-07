@extends('admin.layout.dashboard')

@section('content')


    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">

        @if (session('status'))
        <div class=" w-auto on inline-block element pr-16 bg-green-50 text-green-800 text-sm px-4 py-3 rounded relative" role="alert">
            <i class="fas fa-check pr-1"></i>
            <strong class="font-bold">{{ session('status') }} </strong>
        </div>
        @endif

        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 py-3  rounded-bl-lg rounded-br-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Email</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Bank Details</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Account no.</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Amount</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Status</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Date</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">


                   @forelse ($withdrawTransaction as $withdrawTransactions)
                    <tr>
                        <td class="whitespace-no-wrap border-b border-gray-500">
                            <div class="flex items-center px-2 py-2">
                                <div>
                                    <img class="h-10 w-10 rounded-full" src="{{asset('images/profile')}}/{{ $withdrawTransactions->user->profile_photo_path }}" alt="">
                                  </div>

                                <div class="text-sm leading-5 text-gray-800 mx-2">{{ $withdrawTransactions->user->name }}</div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class=" text-sm leading-5 text-blue-900">{{ $withdrawTransactions->user->email }} </div>
                        </td>


                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <div class=" text-sm leading-5 text-blue-900">
                                {{ $withdrawTransactions->bankDetail->name }}-({{ $withdrawTransactions->bankDetail->account_name }}) </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <div class="text-sm leading-5 text-blue-900">{{ $withdrawTransactions->bankDetail->account_no }}</div>
                        </td>

                          <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <div class="text-sm leading-5 text-blue-900"> ₦ {{ $withdrawTransactions->amount }} </div>

                          </td>

                          <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <span class="relative inline-block px-3 py-1  text-red-900 leading-tight">
                                <span aria-hidden class="absolute inset-0 bg-red-200 opacity-50 rounded-full"></span>
                                <span class="relative text-xs font-semibold"> {{ $withdrawTransactions->status }}</span>
                            </span>

                          </td>

                          <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <div class="text-sm leading-5 text-blue-900">{{ $withdrawTransactions->created_at }} </div>

                          </td>

                      <td class=" px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500">
                          <div class="flex items-center ">

                            <a href="{{ route('transactions.show', $withdrawTransactions->id) }}" class="mr-3 text-sm bg-indigo-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                <i class="fas fa-pencil-alt"></i>
                                Process
                            </a>

                            {{-- <form action="{{route('users.destroy', $user->id)}}" method="POST"  >
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="text-sm bg-red-700 hover:bg-red-900 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                <i class="fas fa-trash"></i>
                                Delete
                            </button>
                            </form> --}}
                         </div>

                    </td>

                </tr>
                    @empty
                    <tr>
                        <div class=" py-5"> No Withdrawal Transaction Available  </div>
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
                    {{ $withdrawTransaction->links() }}
                </div>

            </nav>
            </div>
        </div>

        </div>
    </div>

@endsection
