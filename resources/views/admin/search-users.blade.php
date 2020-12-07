@extends('admin.layout.dashboard')

@section('search')
<form action="{{ route('user.search') }}" method="POST" role="search">
    @csrf
    <div class="relative pull-right pl-4 pr-4 md:pr-0">
        <input type="text" name="search" placeholder="Search users" class="w-full bg-gray-100 text-sm text-gray-800 transition border focus:outline-none focus:border-gray-700 rounded py-1 px-2 pl-10 appearance-none leading-normal">
        <div class="absolute search-icon" style="top: 0.375rem;left: 1.75rem;">
           <button type="submit"> <svg class="fill-current pointer-events-none text-gray-800 w-4 h-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M12.9 14.32a8 8 0 1 1 1.41-1.41l5.35 5.33-1.42 1.42-5.33-5.34zM8 14A6 6 0 1 0 8 2a6 6 0 0 0 0 12z"></path>
            </svg>
        </button>
        </div>
    </div>
</form>

@endsection

@section('content')


    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">

        {{--  @if (session('status'))
        <div class="w-auto bg-green-400 border border-green-900 text-cool-gray-50 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold"> {{ session('status') }} </strong>
          </div>
        @endif  --}}

{{--  Withdrawal Link styled as a button --}}
        <div class=" flex flex-row-reverse mt-4 mb-7 ">
            <a href="{{ route('users.create') }}" class=" inline-block bg-purple-900 text-cool-gray-50 px-4 py-3"> Add New User </a>
        </div>


        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 py-3  rounded-bl-lg rounded-br-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Name</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Email</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Account Balance</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Created Date</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Verified Date</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white">


                {{--  @if (count($users) > 1 )  --}}

                   @forelse ($users as $user)
                    <tr>
                        <td class="whitespace-no-wrap border-b border-gray-500">
                            <div class="flex items-center px-6 py-4">
                                <div>
                                    <img class="h-10 w-10 rounded-full" src="{{ asset('images/profile') }}/{{ $user->profile_photo_path }}" alt="">
                                  </div>

                                <div class="text-sm leading-5 text-gray-800 mx-2">{{ $user->name}} </div>
                            </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class=" text-sm leading-5 text-blue-900"> {{ $user->email }} </div>
                        </td>


                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <div class=" text-sm leading-5 text-blue-900"> ₦ {{ $user->account_balance }} </div>
                        </td>

                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <div class="text-sm leading-5 text-blue-900"> {{ $user->created_at}} </div>

                          </td>
                          <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">
                            <div class="text-sm leading-5 text-blue-900"> {{ $user->email_verified_at}} </div>

                          </td>

                        <td class=" px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500">
                          <div class="flex items-center ">

                            <a href="{{ route('users.show', $user->id ) }}" class="mr-3 text-sm bg-indigo-700 hover:bg-blue-700 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                <i class="fas fa-pencil-alt"></i>
                                Credit Account
                            </a>

                            <form action="{{route('users.destroy', $user->id)}}" method="POST"  >
                                @csrf
                                @method('DELETE')
                            <button type="submit" class="text-sm bg-red-700 hover:bg-red-900 text-white py-1 px-2 rounded focus:outline-none focus:shadow-outline">
                                <i class="fas fa-trash"></i>
                                Delete
                            </button>
                            </form>
                         </div>

                    </td>

                </tr>
                     @empty
                    <tr>
                        <div class=" py-5"> No User Available  </div>
                    </tr>
                    @endforelse
                    {{-- @endforeach
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
                    @endempty  --}}


                </tbody>
            </table>
        <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
            <div>

            </div>
            <div>
            <nav class="relative z-0 inline-flex shadow-sm">
                <div>
                    {{ $users->links() }}
                </div>

            </nav>
            </div>
        </div>

        </div>
    </div>

@endsection
