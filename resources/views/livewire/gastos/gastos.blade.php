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
            <li>
                <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('Bills')}}</a>
                </div>
            </li>
        </ol>
    </nav>
    <x-titulo><i class="far fa-money-bill-alt"></i> &nbsp; {{__('Bills')}}</x-titulo>
        <div class="grid grid-cols-1 gap-2 lg:grid-cols-6 lg:gap-1">
            <div class="m-2 col-span-2">
                 <x-card2>   
                    <div class="px-4 py-2 bg-neutral-100 mb-2 m-1 mr-1 border-2 border-solid rounded-lg"> 
                        @if ($updating == 0)
                            <div class="bg-blue-400 text-white text-center py-1 font-bold font-serif mb-2 shadow-2xl">{{__('New Expenses')}}</div>
                        @else
                            <div class="bg-green-400 text-white text-center py-1 font-bold font-serif mb-2 shadow-2xl">{{__('Update Expense')}}</div>
                        @endif  
                        @if ($errors->first('detalle'))
                            <textarea wire:model="detalle" id="detalle" rows="4" class="block p-2.5 w-64 text-sm text-red-900 bg-red-50 rounded-lg border border-red-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-red-700 dark:border-red-600 dark:placeholder-red-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('Expenses Detail')}}..."></textarea>
                            <p class="mt-2 text-xs text-red-600">{{$errors->first('detalle')}} </p>
                        @else
                            <textarea wire:model="detalle" id="detalle" rows="4" class="block p-2.5 w-64 text-sm text-gray-900 bg-gray-50 rounded-lg border border-gray-300 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="{{__('Expenses Detail')}}..."></textarea>
                        @endif
                    </div>
                    @if ($errors->first('total_gasto')) 
                        <div class="px-4 py-2 bg-neutral-100 m-1 mr-1 border-2 border-solid rounded-xl">
                            <div class="relative mb-4">
                                <input wire:model="total_gasto" id="total_gasto" type="text" autocomplete="off" class="bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                                <label for="total_gasto" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Total Expenses')}}</label>
                                <p class="mt-2 text-xs text-red-600">{{$errors->first('total_gasto')}} </p>
                            </div>
                        </div>
                    @else
                        <div class="px-4 py-2 bg-neutral-100 h-12 mb-4 m-1 mr-1 border-2 border-solid rounded-lg">
                            <div class="relative mb-4">
                                <input wire:model="total_gasto" id="total_gasto" type="text" autocomplete="off" class="block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-900 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                                <label for="total_gasto" class="absolute text-xs text-gray-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Total Expenses')}}</label>
                            </div> 
                        </div>
                    @endif
                    <div class="flex justify-end mb-2">
                        @if ($updating == 0)
                            <button wire:click.prevent="create()" class="px-6 py-1 mr-2 h-8 text-xs font-semibold text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300"><i class="fas fa-save fa-stack fa-lg"></i>{{__('Save')}} </button>
                        @else
                            <button wire:click.prevent="create()" class="px-8 py-1 mr-2 h-8 text-xs font-semibold text-center inline-flex items-center text-white bg-green-600 rounded-lg hover:bg-green-600 focus:ring-4 focus:outline-none focus:ring-green-300"><i class="far fa-edit fa-lg"></i>{{__('Update')}} </button>
                        @endif
                        <button wire:click.prevent="closeModal()" class="px-5 py-1 mr-2 h-8 text-xs font-semibold text-center inline-flex items-center text-white bg-slate-500 rounded-lg hover:bg-slate-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-slate-300"><i class="fas fa-window-close fa-stack fa-lg"></i>{{__('Cancel')}} </button>
                    </div> 
            </x-card2>
             </div>
            <div class="col-span-4">
                 <x-card2>
                    <form method="GET">
                        <div class="grid grid-cols-3 gap-2 lg:grid-cols-5 lg:gap-2">
                            @include('herramientas.SearchBox')
                            <div class="justify-right px-1 py-4 mr-2">
                                    <a href="#" title="{{__('Export to Pdf')}}">
                                        <i class="far fa-file-pdf fa-2x" style="color: red"></i>
                                    </a>  
                                    <a href="#" title="{{__('Export to Xls')}}">
                                        <i class="far fa-file-excel fa-2x" style="color: green"></i>
                                    </a> 
                                    <a href="#" title="{{__('Export to Csv')}}">
                                        <i class="fas fa-file-csv fa-2x" style="color: #615dec"></i>
                                    </a> 
                                </div>
                                <div class="flex justify-end px-1 py-4 "> 
                                    <a href="{{route('Admin.Gastos.Create')}}" class="h-8 px-10 py-1 text-xs font-medium text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300 dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800 whitespace-nowrap" title="{{__('New User')}}" >
                                        <i class="fas fa-plus-circle fa-lg fa-stack"></i> {{__( 'New' )}}
                                    </a>
                                </div>
                        </div>
                    </form>
                </x-card2> 
                 <x-card>
                @if ($gastos->count())
                    @foreach ($gastos as $gasto)
                            <div id="toast-interactive" class="justify-center inline-block mb-14 max-w-xs p-2 text-gray-500 bg-white rounded-lg shadow-2xl dark:bg-gray-800 dark:text-gray-400 mr-1 m-2" role="alert">
                                <div class="flex px-5">
                                    <div class="m-1 inline-flex items-center justify-center shrink-0 w-6 h-8 text-blue-500 bg-green-100 rounded-lg dark:text-blue-300 dark:bg-blue-900">
                                        <i class="far fa-money-bill-alt"></i>
                                    </div>
                                    <div class="ms-0 text-sm font-normal">
                                        <span class="mb-1 text-sm font-bold text-gray-900 dark:text-white"> {{$gasto->detalle}}</span>
                                        <div class="mb-4 text-xs font-semibold text-blue-600">Total: ${{number_format($gasto->total_gasto)}} Fecha: {{$gasto->fecha_pago}}</div> 
                                        <div class="grid grid-cols-4 gap-2">
                                            <div>
                                                <a href="#" wire:click="seed({{$gasto->id}})" class="border-2 px-1 py-1 hover:bg-purple-100 focus:ring-4 focus:outline-none focus:ring-purple-100 dark:bg-purple-200 dark:hover:bg-purple-400 dark:focus:ring-purple-600" title="{{__('see')}}">
                                                    <i class="far fa-eye fa-lg" style="color: purple;"></i>
                                                </a>                                    
                                            </div>
                                            <div>
                                                <a href="#" wire:click="edit({{$gasto}})" class="border-2 px-1 py-1 hover:bg-blue-100 focus:ring-4 focus:outline-none focus:ring-blue-100 dark:bg-blue-200 dark:hover:bg-blue-400 dark:focus:ring-blue-600" title="{{__('Edit')}}">
                                                    <i class="far fa-edit fa-fw fa-lg" style="color: blue;"></i>
                                                </a>                                      
                                            </div>
                                            <div>
                                                <a href="#" wire:click="delete({{$gasto->id}})" class="border-2 px-1 py-1 hover:bg-red-100 focus:ring-4 focus:outline-none focus:ring-red-100 dark:bg-red-200 dark:hover:bg-red-400 dark:focus:ring-red-600" title="{{__('Delete')}}">
                                                    <i class="far fa-trash-alt fa-fw fa-lg" style="color: red;"></i>
                                                </a>
                                            </div>
                                        </div>    
                                    </div>
                                </div>
                            </div>
                    @endforeach
                @else
                    <div class="px-6 py-4 text-red-400 font-bold font-serif text-sm">
                        {{__('There are no records')}} .....
                    </div>     
                @endif
                <div class="px-4 py-2">
                    {{$gastos->links()}}
                </div>     
            </x-card>
            </div>
        </div>
</div>
