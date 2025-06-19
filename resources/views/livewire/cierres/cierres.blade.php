<x-card> 

    <nav class="flex mb-4 justify-end" aria-label="Breadcrumb">
        <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
            <li class="inline-flex items-center">
                <a href="{{ route('dashboard') }}" class="inline-flex items-center text-sm font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white" wire:navigate>
                <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                    <path d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z"/>
                </svg>
                {{__('Home')}}
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 w-3 h-3 text-gray-400 mx-1" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="#" class="ms-1 text-sm font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white" wire:navigate>{{__('Movements')}}</a>
                </div>
            </li>
        </ol>
    </nav>
    <x-titulo><i class="fas fa-cubes"></i> {{__('Movements')}}</x-titulo>   

    <ul class="flex flex-wrap text-xs  text-center text-gray-500  border-b-4 border-gray-200 dark:border-gray-500 dark:text-gray-400">
        <li  class="m-1 inline-block p-2 {{ $activeTab === 'diario' ? 'text-white bg-blue-400 font-bold' : 'text-gray-600 bg-gray-100'}} rounded-t-lg" id="diario" wire:click="setActiveTab('diario')"><i class="fas fa-sun fa fw"></i> {{__('Daily Closing')}}</li>
        <li  class="m-1 inline-block p-2 {{ $activeTab === 'arl' ? 'text-white bg-blue-400 font-bold' : 'text-gray-600 bg-gray-100'}} rounded-t-lg" id="arl" wire:click="setActiveTab('arl')"><i class="fas fa-globe fa-fw"></i> {{__('Monthly Closing')}}</li>
        <li  class="m-1 inline-block p-2 {{ $activeTab === 'afp' ? 'text-white bg-blue-400 font-bold' : 'text-gray-600 bg-gray-100'}} rounded-t-lg" id="afp" wire:click="setActiveTab('afp')"><i class="far fa-money-bill-alt"></i> {{__('Income')}}</li>
        <li  class="m-1 inline-block p-2 {{ $activeTab === 'caja' ? 'text-white bg-blue-400 font-bold' : 'text-gray-600 bg-gray-100'}} rounded-t-lg" id="caja" wire:click="setActiveTab('caja')"><i class="fas fa-comment-dollar"></i> {{__('Bills')}}</li>
     </ul>
    <div class="tab-content mt3">
            @if ($activeTab === 'diario')
                <div id="diario">
                     <livewire:cierres.cierresdiario/> 
                </div>
            @endif
            @if ($activeTab === 'arl')
                <div id="arl">
{{--                     <livewire:arls.arls/>
 --}}                </div>
            @endif
            @if ($activeTab === 'afp')
                <div id="afp">
{{--                     <livewire:afps.afps/>
 --}}                </div>
            @endif
        
            @if ($activeTab === 'caja')
             
                <div id="caja">
{{--                     <livewire:cajas.cajas/>
 --}}                </div>
            @endif
       
    </div>
</x-card> 
