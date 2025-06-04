<div>
    <nav class="flex justify-end px-5 py-3 text-gray-700  dark:bg-gray-800 dark:border-gray-700" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
           <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                    </svg>
                    {{__('Home')}}
                </a>
            </li>
            <li class="inline-flex items-center">
                <a href="{{ route('Pagos.Pagos') }}" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    {{__('Payments')}}
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('New')}}</a>
                </div>
            </li>
        </ol>
    </nav>
    <x-titulo><i class="far fa-money-bill-alt fa-fw"></i> &nbsp; {{__('New Payment')}}</x-titulo>
    <div class="grid grid-cols-2 gap-2 lg:grid-cols-3 lg:gap-2 m-2">
        <div class="col-span-2">
             <x-card3>
                 <div class="grid grid-cols-2 gap-2 lg:grid-cols-3 lg:gap-2 m-2">
                    <div class="col-span-2">
                        <div class="justify-center border bg-stone-100 shadow-lg col-span-3 px-4 py-2 h-12 m-2">
                            <label for="default-search" class="mb-2 text-sm font-medium text-gray-900 sr-only dark:text-white">Search</label>
                            <div class="relative">
                                <div  class="absolute inset-y-0 start-0 flex items-center ps-3 pointer-events-none">
                                    <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z"/>
                                    </svg>
                                </div>
                                <input wire:model="documento" wire:keydown.enter="ScanningCode($event.target.value)" id="documento" type="text" class="h-8 block w-full p-4 ps-10 text-sm text-gray-900 border border-gray-300 rounded bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" autocomplete="off"  placeholder="{{__('Search Document...')}}" required />
                                <p class="mt-2 text-xs text-red-600">{{$errors->first('documento')}} </p>
                            </div>
                        </div>
                    </div>
                    <div class="py-5">
                       <span class="bg-blue-400 text-white text-center py-3 px-8 font-serif font-bold shadow-2xl">{{__('Payment Receipt')}}</span>
                    </div>
                </div>
            </x-card3>
            @if ($cart->count())
                <x-card>
                    <table class=" text-sm font-light text-center  w-full">
                        <thead class="text-white bg-blue-400 dark:bg-neutral-400">
                            <tr>
                                <th class="text-xs px-2 font-bold font-serif">{{__('Document')}}</th>
                                <th class="text-xs py-2 font-bold font-serif">{{__('Name')}}</th>
                                <th class="text-xs py-2 font-bold font-serif">{{__('Health(Eps)')}}</th>
                                <th class="text-xs py-2 font-bold font-serif">{{__('Arl(%)')}}</th>
                                <th class="text-xs px-2 font-bold font-serif">{{__('Pensión')}}</th>
                                <th class="text-xs py-2 font-bold font-serif">{{__('Compensation Box')}}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($cart as $item)
                                <tr>
                                    <td class="py-2 px-1 font-sans text-xs text-left">{{$item['documento']}}</td>
                                    <td class="px-2 py-2 font-sans text-xs">{{$item['name']}}</td>
                                    <td class="px-2 py-2 font-sans text-xs">{{$item['eps']}}</td>
                                    <td class="px-2 py-2 font-sans text-xs">{{$item['riesgo']}}</td>
                                    <td class="px-2 py-2 font-sans text-xs">{{$item['afp']}}</td>
                                    <td class="px-2 py-2 font-sans text-xs">{{$item['caja']}}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </x-card>
            @else
                <div class="px-6 py-4 text-red-400 font-bold font-serif text-sm">
                    {{__('No contributions')}} .....
                </div>     
            @endif 
        </div>
        <div>
            <x-card2>

                <x-card>
                    <div class="bg-blue-400 text-white text-center py-1 m-2 font-bold font-serif mb-3">Totales</div>
                    <div class="grid grid-cols-2 gap-1 lg:grid-cols-2 lg:gap-2 m-2">
                        <div>
                            <div class="mb-2 text-xs m-2 font-bold border-b-2 border-l-4">
                                <span class="m-2 font-serif">Sub Total:</span>
                            </div>
                            <div class="mb-2 text-xs m-2 font-bold border-b-2 border-l-4">
                                <span class="m-2 font-serif">Administración:</span>
                            </div>
                            <div class="mb-2 text-xs m-2 font-bold border-b-2 border-l-4">
                                <span class="m-2 font-serif">Total:</span>
                            </div>
                        </div>
                        <div>
                            <div class="mb-2 text-xs m-2 border-b-2 text-center">
                                <span class="m-2 font-serif">${{number_format($subTotalCart)}}</span>
                            </div>
                            <div class="mb-2 text-xs m-2 border-b-2 text-center">
                                <span class="m-2 font-serif">${{number_format($adm)}}</span>
                            </div>
                            <div class="mb-2 text-xs m-2 border-b-2 text-center">
                                <span class="m-2 font-serif">${{number_format($totalCart)}}</span>
                            </div>
                        </div>
                   </div>
                    <div class="flex justify-end border-x-0 mb-4">
                        <button wire:click.prevent="Create()" class="px-6 py-1 mr-2 h-8 text-xs font-semibold text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300"><i class="fas fa-save fa-stack fa-lg"></i>{{__('Save')}} </button>
                        <button wire:click.prevent="Cancelar()" class="px-6 py-1 mr-2 h-8 text-xs font-semibold text-center inline-flex items-center text-white bg-slate-500 rounded-lg hover:bg-slate-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-slate-300"><i class="fas fa-window-close fa-stack fa-lg"></i>{{__('Cancel')}} </button>
                    </div>
                     
                </x-card>
               
            </x-card2>
        </div>
    </div>
</div>
