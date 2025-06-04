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
                <a href="{{ route('Afiliaciones.Afiliados') }}" class="inline-flex items-center text-xs font-medium text-gray-700 hover:text-blue-600 dark:text-gray-400 dark:hover:text-white">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    {{__('Affiliations')}}
                </a>
            </li>
            <li>
                <div class="flex items-center">
                    <svg class="rtl:rotate-180 block w-3 h-3 mx-1 text-gray-400 " aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                        <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="m1 9 4-4-4-4"/>
                    </svg>
                    <a href="#" class="ms-1 text-xs font-medium text-blue-400 hover:text-blue-600 md:ms-2 dark:text-gray-400 dark:hover:text-white">{{__('Edit')}}</a>
                </div>
            </li>
        </ol>
    </nav>
    <x-card2>
        <x-titulo><i class="fab fa-affiliatetheme"></i> &nbsp; {{__('Edit Affiliate')}}</x-titulo>
    </x-card2>
    <x-card>
        <div class="grid grid-cols-2 gap-1 lg:grid-cols-4 lg:gap-2 mb-1  m-2">
             @if ($errors->first('tdocumento')) 
                <div class="px-1 py-2 border bg-slate-100">
                    <select wire:model="tdocumento" id="small" class="font-semibold block w-full p-2 text-xs text-red-900 border border-red-300 rounded bg-red-50 focus:ring-red-500 focus:border-red-500">
                        <option selected>{{__('Document type')}}</option>
                        @foreach ( $TDocumentos as $td )
                            <option value="{{$td->id}}">{{$td->nombre}}</option>
                        @endforeach 
                    </select>
                    <p class="mt-2 text-xs text-red-600">{{$errors->first('tdocumento')}} </p>
                </div>
            @else
                <div class="px-1 py-2 h-12 border bg-slate-100">
                    <select wire:model="tdocumento" id="small" class="font-semibold block w-full p-2 mb-6 text-xs text-gray-500 border border-gray-300 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 h-8">
                            <option selected>{{__('Document type')}}</option>
                            @foreach ( $TDocumentos as $td )
                                <option value="{{$td->id}}">{{$td->nombre}}</option>
                            @endforeach 
                    </select>
                </div>
            @endif
            @if ($errors->first('documento')) 
                    <div class="px-2 py-2 border bg-slate-100">
                        <div class="relative mb-4">
                            <input wire:model="documento" id="nit" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                            <label for="nit" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Document number')}}</label>
                            <p class="mt-2 text-xs text-red-600">{{$errors->first('documento')}} </p>
                        </div>
                    </div>
                @else
                    <div class="px-2 py-2 border bg-slate-100 h-12">
                        <div class="relative mb-4">
                            <input wire:model="documento" id="documento" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                            <label for="documento" class="absolute text-xs text-green-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Document number')}}</label>
                        </div> 
                    </div>
                @endif
            @if ($errors->first('nombre')) 
                <div class="px-4 py-2 border bg-slate-100 h-12 col-span-2">
                    <div class="relative mb-4">
                        <input wire:model="nombre" id="nombre" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                        <label for="nombre" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Affiliate Name')}}</label>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('nombre')}} </p>
                    </div>
                </div>
            @else
                <div class="px-4 py-2 border bg-slate-100 h-12 col-span-2">
                    <div class="relative mb-4">
                        <input wire:model="nombre" id="nombre" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="nombre" class="absolute text-xs text-green-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Affiliate Name')}}</label>
                    </div> 
                </div>
            @endif 
        </div>
        <div class="grid grid-cols-1 gap-2 lg:grid-cols-6 lg:gap-2 mb-2  m-2">
            @if ($errors->first('direccion')) 
                <div class="px-1 py-2 border bg-slate-100 h-12 col-span-2">
                    <div class="relative mb-4">
                        <input wire:model="direccion" id="direccion" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                        <label for="direccion" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Address')}}</label>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('direccion')}} </p>
                    </div>
                </div>
            @else
                <div class="px-1 py-2 border bg-slate-100 h-12 col-span-2">
                    <div class="relative mb-4">
                        <input wire:model="direccion" id="direccion" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="direccion" class="absolute text-xs text-green-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Address')}}</label>
                    </div> 
                </div>
            @endif 
            @if ($errors->first('ciudad_id')) 
                <div class="px-4 py-2 border bg-slate-100 h-12 col-span-2">
                    <select wire:model="ciudad_id" class="js-example-basic-single block w-full p-2 text-xs text-red-900 border border-red-300 rounded bg-red-50 focus:ring-red-500 focus:border-red-500">
                        <option selected>{{__('City')}}</option>
                        @foreach ( $Ciudades as $Ciudade )
                            <option value="{{$Ciudade->id}}">{{$Ciudade->nombre}}</option>
                        @endforeach 
                    </select>
                    <p class="mt-2 text-xs text-red-600">{{$errors->first('ciudad_id')}} </p>
                </div>
            @else
                <div class="px-4 py-2 border bg-slate-100 h-12 col-span-2">
                    <select wire:model="ciudad_id" id="ciudad_id" class="js-example-basic-single block w-full p-2 mb-6 text-xs text-gray-900 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 h-8">
                           <option selected>{{__('City')}}</option>
                           @foreach ( $Ciudades as $Ciudade )
                               <option value="{{$Ciudade->id}}">{{$Ciudade->nombre}}</option>
                           @endforeach 
                    </select>
                </div>
            @endif 
            @if ($errors->first('telefono')) 
                <div class="px-2 py-2 border bg-slate-100">
                    <div class="relative mb-4">
                        <input wire:model="telefono" id="telefono" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                        <label for="telefono" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Phone')}}</label>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('telefono')}} </p>
                    </div>
                </div>
            @else
                <div class="px-2 py-2 border bg-slate-100 h-12">
                    <div class="relative mb-4">
                        <input wire:model="telefono" id="documento" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="telefono" class="absolute text-xs text-green-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Phone')}}</label>
                    </div> 
                </div>
            @endif 
            @if ($errors->first('celular')) 
                <div class="px-1 py-2 border bg-slate-100">
                    <div class="relative mb-4">
                        <input wire:model="celular" id="celular" type="text" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                        <label for="celular" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Cell phone')}}</label>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('celular')}} </p>
                    </div>
                </div>
            @else
                <div class="px-1 py-2 border bg-slate-100 h-12">
                    <div class="relative mb-4">
                        <input wire:model="celular" id="celular" type="text" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="celular" class="absolute text-xs text-green-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Cell phone')}}</label>
                    </div> 
                </div>
            @endif 
            
        </div>
        <div class="grid grid-cols-2 gap-1 lg:grid-cols-6 lg:gap-2 mb-1  m-2">
            @if ($errors->first('email')) 
                <div class="px-1 py-2 border bg-slate-100 h-12 col-span-2">
                    <div class="relative mb-4">
                        <input wire:model="email" id="email" type="email" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                        <label for="email" class="font-bold absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Email')}}</label>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('email')}} </p>
                    </div>
                </div>
            @else
                <div class="px-1 py-2 border bg-slate-100 h-12 col-span-2">
                    <div class="relative mb-4">
                        <input wire:model="email" id="email" type="email" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="email" class="font-bold absolute text-xs text-green-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto">{{__('Email')}}</label>
                    </div> 
                </div>
            @endif
            @if ($errors->first('fecha_nac')) 
                <div class="px-4 py-2 border bg-slate-100 h-12 col-span-2">
                    <div class="relative mb-4">
                        <input wire:model="fecha_nac" id="fecha_nac" type="date" class="font-semibold bg-red-50 border border-red-500 text-red-900 placeholder-red-700 text-sm rounded focus:ring-red-500 focus:border-red-500 block w-full p-2.5 h-8" placeholder=" " />
                        <label for="nombre" class="absolute text-sm text-red-700 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-red-600 peer-focus:dark:text-red-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Date of Birth')}}</label>
                        <p class="mt-2 text-xs text-red-600">{{$errors->first('fecha_nac')}} </p>
                    </div>
                </div>
            @else
                <div class="px-4 py-2 border bg-slate-100 h-12 col-span-2">
                    <div class="relative mb-4">
                        <input wire:model="fecha_nac" id="fecha_nac" type="date" class="font-semibold block px-2.5 pb-1.5 pt-3 w-full text-xs text-gray-500 bg-white rounded h-8 border-1 border-gray-300 appearance-none focus:outline-none focus:ring-0 focus:border-blue-600 peer" placeholder=" " />
                        <label for="fecha_nac" class="absolute text-xs text-green-500 duration-300 transform -translate-y-3 scale-75 top-1 z-10 origin-[0] bg-white px-2 peer-focus:px-2 peer-focus:text-blue-600 peer-focus:dark:text-blue-500 peer-placeholder-shown:scale-100 peer-placeholder-shown:-translate-y-1/2 peer-placeholder-shown:top-1/2 peer-focus:top-1 peer-focus:scale-75 peer-focus:-translate-y-3 start-1 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto font-bold">{{__('Date of Birth')}}</label>
                    </div> 
                </div>
            @endif 
            <div class="flex items-center">
                <input wire:model="sexo" id="default-radio-1" type="radio" value="1" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-1" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__('Female')}}</label>
            </div>
            <div class="flex items-center">
                <input wire:model="sexo" id="default-radio-2" type="radio" value="2" name="default-radio" class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="default-radio-2" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">{{__('Male')}}</label>
            </div>
        </div>
        <div class="grid grid-cols-2 gap-1 lg:grid-cols-4 lg:gap-2 mb-6  m-2">
            @if ($errors->first('eps_id')) 
                <div class="px-4 py-2 border bg-slate-100 h-12">
                    <select wire:model="eps_id" class="js-example-basic-single block w-full p-2 text-xs text-red-900 border border-red-300 rounded bg-red-50 focus:ring-red-500 focus:border-red-500">
                        <option selected>Salud (Eps)</option>
                        @foreach ( $Ciudades as $Ciudade )
                            <option value="{{$Ciudade->id}}">{{$Ciudade->nombre}}</option>
                        @endforeach 
                    </select>
                    <p class="mt-2 text-xs text-red-600">{{$errors->first('eps_id')}} </p>
                </div>
            @else
                <div class="px-4 py-2 border bg-slate-100 h-12">
                    <select wire:model="eps_id" id="eps_id" class="js-example-basic-single block w-full p-2 mb-6 text-xs text-gray-900 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 h-8">
                        <option selected>Salud (Eps)</option>
                            @foreach ( $Eps as $Ep )
                                <option value="{{$Ep->id}}">{{$Ep->nombre}}</option>
                            @endforeach 
                    </select>
                </div>
            @endif 
            @if ($errors->first('afp_id')) 
                <div class="px-4 py-2 border bg-slate-100 h-12">
                    <select wire:model="afp_id" class="js-example-basic-single block w-full p-2 text-xs text-red-900 border border-red-300 rounded bg-red-50 focus:ring-red-500 focus:border-red-500">
                        <option selected>Pensión (AFP)</option>
                        @foreach ( $Afps as $Afp )
                            <option value="{{$Afp->id}}">{{$Afp->nombre}}</option>
                        @endforeach 
                    </select>
                    <p class="mt-2 text-xs text-red-600">{{$errors->first('afp_id')}} </p>
                </div>
            @else
                <div class="px-4 py-2 border bg-slate-100 h-12">
                    <select wire:model="afp_id" id="eps_id" class="js-example-basic-single block w-full p-2 mb-6 text-xs text-gray-900 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 h-8">
                        <option selected>Pensión (AFP)</option>
                            @foreach ( $Afps as $Afp )
                                <option value="{{$Afp->id}}">{{$Afp->nombre}}</option>
                            @endforeach 
                    </select>
                </div>
            @endif   
            @if ($errors->first('riesgo')) 
                <div class="px-4 py-2 border bg-slate-100 h-12">
                    <select wire:model="riesgo" class="js-example-basic-single block w-full p-2 text-xs text-red-900 border border-red-300 rounded bg-red-50 focus:ring-red-500 focus:border-red-500">
                        <option selected>{{__('Risks (ARL))')}}</option>
                        <option value="1">0,52%</option>
                        <option value="2">1,044%</option>
                        <option value="3">2,44%</option>
                        <option value="4">4,35%</option>
                        <option value="5">6,96%</option> 
                    </select>
                    <p class="mt-2 text-xs text-red-600">{{$errors->first('riesgo')}} </p>
                </div>
            @else
                <div class="px-4 py-2 border bg-slate-100 h-12">
                    <select wire:model="riesgo" id="riesgo" class="js-example-basic-single block w-full p-2 mb-6 text-xs text-gray-900 border border-gray-300  bg-gray-50 focus:ring-blue-500 focus:border-blue-500 h-8">
                        <option selected>{{__('Risks (ARL)')}}</option>
                        <option value="0.0052">1 - Oficina</option>
                        <option value="0.01044">2 - Campo</option>
                        <option value="0.0243">3 - Mecanicos</option>
                        <option value="0.0435">4 - Conductores</option>
                        <option value="0.696">5 - Construcción</option>
                    </select>
                </div>
            @endif
        <div class="flex items-center border bg-slate-100 px-4">
            <input wire:model.fill="caja" {{ $this->caja = 1 ? 'checked' : ''}} id="link-checkbox" type="checkbox" value="1" class="w-4 h-4 text-blue-600 bg-white border-gray-600 rounded-sm focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
            <label for="link-checkbox" class="ms-2 text-xs font-bold text-green-600 dark:text-green-600">{{__('Compensation Box')}} </label>
        </div>
        </div>
         <div class="flex justify-end border-x-0 mb-4">
            <button wire:click.prevent="create({{$afiliadoid}})" class="px-6 py-1 mr-2 h-8 text-xs font-semibold text-center inline-flex items-center text-white bg-blue-700 rounded-lg hover:bg-blue-600 focus:ring-4 focus:outline-none focus:ring-blue-300"><i class="fas fa-save fa-stack fa-lg"></i>{{__('Save')}} </button>
            <button wire:click.prevent="closeModal()" class="px-6 py-1 mr-2 h-8 text-xs font-semibold text-center inline-flex items-center text-white bg-slate-500 rounded-lg hover:bg-slate-600 hover:text-white focus:ring-4 focus:outline-none focus:ring-slate-300"><i class="fas fa-window-close fa-stack fa-lg"></i>{{__('Cancel')}} </button>
        </div>
    </x-card>
</div>
