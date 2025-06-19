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
                <a href="{{ route('Admin.Planillas') }}" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    {{__('Worksheets')}}
                </a>
            </li>
            <li>
                <div class="flex items-center">
                <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                    <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                </svg>
                <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('Trigger')}}</a>
                </div>
            </li>
        </ol>
    </nav>
    <x-titulo><i class="fas fa-table"></i> &nbsp; {{__('New Form')}}</x-titulo>
            <div class="inline-flex rounded-md shadow-xs m-2 py-4 justify-end" role="group">
                <button wire:click.prevent="Create()" type="button" class="inline-flex items-center px-4 py-2 text-xs font-medium text-gray-900 bg-transparent border border-gray-900 rounded-s-lg hover:bg-gray-300 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-300 focus:bg-gray-500 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700" title="Crear Planilla">
                     <i class="fas fa-save"></i> &nbsp; {{__('Save')}}
                </button>
                <button wire:click.prevent="refresh()" type="button" class="inline-flex items-center px-4 py-2 text-xs font-medium text-gray-900 bg-transparent border-t border-b border-gray-900 hover:bg-gray-300 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-300 focus:bg-gray-500 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                    <i class="fas fa-sync-alt"></i> &nbsp; {{__('Refresh')}}
                </button>
                <button wire:click.prevent="Cancelar()" type="button" class="inline-flex items-center px-4 py-2 text-xs font-medium text-gray-900 bg-transparent border border-gray-900 rounded-e-lg hover:bg-gray-300 hover:text-white focus:z-10 focus:ring-2 focus:ring-gray-300 focus:bg-gray-500 focus:text-white dark:border-white dark:text-white dark:hover:text-white dark:hover:bg-gray-700 dark:focus:bg-gray-700">
                   <i class="fas fa-window-close"></i> &nbsp; {{__('Cancel')}}
                </button>
            </div>
            @if ($planillas->count())
                <x-card>
                    <table class="min-w-full font-light text-center m-0.5">
                            <thead class="text-white bg-blue-400 border-b dark:border-neutral-500 dark:bg-neutral-400">
                                <tr>
                                    <th class="px-2 py-1 font-serif text-xs text-left">{{__('Tipo Id')}}</th>
                                    <th class="px-2 py-1 font-serif text-xs text-left">{{__('Document')}}</th>
                                    <th class="px-2 py-1 font-serif text-xs text-left">{{__('Name')}}</th>
                                    <th class="px-2 py-1 font-serif text-xs text-left">{{__('Eps')}}</th>
                                    <th class="px-2 py-1 font-serif text-xs text-left">{{__('Arl')}}</th>
                                    <th class="px-2 py-1 font-serif text-xs text-left">{{__('Afp')}}</th>
                                    <th class="px-2 py-1 font-serif text-xs text-left">{{__('Caja')}}</th>
                                </tr>
                            </thead>
                            <tbody class="mb-4">
                                @foreach ($planillas as $planilla)
                                        <tr>
                                            <td class="py-2 px-1 font-sans text-xs text-left">{{ $planilla->afiliado->tdocumentos->nombre }}</td>
                                            <td class="py-2 px-1 font-sans text-xs text-left">{{$planilla->afiliado->documento}}</td> 
                                            <td class="py-2 px-1 font-sans text-xs text-left">{{$planilla->afiliado->nombre}}</td> 
                                            <td class="py-2 px-1 font-sans text-xs text-left">{{$planilla->afiliado->eps->nombre}}</td>
                                            <td class="py-2 px-1 font-sans text-xs text-left">{{$planilla->afiliado->riesgo}}</td>
                                            <td class="py-2 px-1 font-sans text-xs text-left">{{$planilla->afiliado->afp->nombre}}</td>
                                            <td class="py-2 px-1 font-sans text-xs text-left">{{$planilla->afiliado->cajas->nombre}}</td>                                   
                                        </tr>
                                @endforeach
                            </tbody>
                    </table> 
                </x-card>
                <x-card2>
                    <div class="justify-end bg-gray-50">
                        <span class="font-bold text-lg">Total a Pagar:  ${{number_format($totalCart, 2)}}</span>
                    </div>
                </x-card2>
             @else
                <div class="px-6 py-4 text-red-400 font-bold font-serif text-sm">
                    {{__('There are no forms')}} .....
                </div>     
            @endif 
    
</div>
