@extends('layouts.master')

@section('content')

    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">

        <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 py-3  rounded-bl-lg rounded-br-lg">
            <table class="min-w-full">
                <thead>
                    <tr>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Debit</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Balance</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Date</th>
                        <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Transfer Confrimation</th>
                    </tr>
                </thead>
                <tbody class="bg-white">
                    @forelse ($outcomeHistory as $outcome)
                    <tr>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm leading-5 text-gray-800">₦{{$outcome->amount}}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">₦{{$outcome->balance}}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-no-wrap border-b text-blue-900 border-gray-500 text-sm leading-5">{{$outcome->updated_at}}</td>

                        {{--  Modal to view payment screenshot  --}}
                        <div x-data="{ imgModal : false, imgModalSrc : '', imgModalDesc : '' }">
                            <template @img-modal.window="imgModal = true; imgModalSrc = $event.detail.imgModalSrc; imgModalDesc = $event.detail.imgModalDesc;" x-if="imgModal">
                              <div x-transition:enter="transition ease-out duration-300" x-transition:enter-start="opacity-0 transform scale-90" x-transition:enter-end="opacity-100 transform scale-100" x-transition:leave="transition ease-in duration-300" x-transition:leave-start="opacity-100 transform scale-100" x-transition:leave-end="opacity-0 transform scale-90" x-on:click.away="imgModalSrc = ''" class="p-2 fixed w-full h-100 inset-0 z-50 overflow-hidden flex justify-center items-center bg-black bg-opacity-75">
                                <div @click.away="imgModal = ''" class="flex flex-col max-w-3xl max-h-full overflow-auto">
                                  <div class="z-50">
                                    <button @click="imgModal = ''" class="float-right pt-2 pr-2 outline-none focus:outline-none">
                                      <svg class="fill-current text-white" xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18">
                                        <path d="M14.53 4.53l-1.06-1.06L9 7.94 4.53 3.47 3.47 4.53 7.94 9l-4.47 4.47 1.06 1.06L9 10.06l4.47 4.47 1.06-1.06L10.06 9z">
                                        </path>
                                      </svg>
                                    </button>
                                  </div>
                                  <div class="p-2">
                                    <img :alt="imgModalSrc" class="object-contain h-1/2-screen" :src="imgModalSrc">
                                    <p x-text="imgModalDesc" class="text-center text-white"></p>
                                  </div>
                                </div>
                              </div>
                            </template>
                          </div>



                        <td class="px-6 py-4 whitespace-no-wrap border-b border-gray-500">
                            <div class="text-sm leading-5 text-blue-900">
                                <div x-data="{}" class="px-2">
                                    <div class="flex -mx-2 text-green-500 font-bold hover:text-green-300">
                                        <a @click=" $dispatch('img-modal', {  imgModalSrc: '{{ asset('images/payments/'.$outcome->payment_screenshot_path) }}', imgModalDesc: '' })" class="cursor-pointer">View
                                    </div>
                                </div>
                            {{--  <a href=" {{asset('storage/payment_screenshot/'.$outcome->payment_screenshot_path) }}"> View </a>  --}}
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <div class="py-5"> No data available </div>
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
                    {{ $outcomeHistory->links() }}
                </div>
            </nav>
            </div>
        </div>

        </div>
    </div>
@endsection

