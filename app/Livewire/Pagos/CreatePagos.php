<?php

namespace App\Livewire\Pagos;

use App\Models\Afiliado;
use App\Models\Pago;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;

use Livewire\Component;


class CreatePagos extends Component
{
    public Collection $cart;
    public $search, $afiliados = [], $subTotalCart=0, $totalCart=0, $documento, $adm, $afiliado;

    public function updatedSearch(){
        if(strlen($this->search) > 1){
            $this->afiliados = Afiliado::where('nombre', 'like', '%'.$this->search. '%')
                                        ->orWhere('documento', 'like', '%'.$this->search. '%')
                                        ->take(5)
                                        ->get();

        }else{
            $this->afiliados = [];
        }
    }

    public function Cancelar(){
        $this->cart = new Collection;
        $this->save();
        $this->dispatch('refresh');
        $this->redirect('/Pagos/Pagos/Create');
        
    }

    function ScanningCode($documento){
       $afiliado = Afiliado::where('documento', $documento)->first();

       if ($afiliado) {
            $this->AddAfiliado($afiliado);
       } else {
            LivewireAlert::title('¡No Encontrado!')
            ->Error()
            ->show();
       }
    }

    public function AddAfiliado($afiliado){
    // 
            if($this->intCart($afiliado->id)){
                return;
            }

         
            $salario = $afiliado->salario;
            $adm = 40000;
           
            $eps = 0.04;

            if($afiliado->afp_id){
                $afp = 0.16;
                $Vlrafp = $salario * $afp;
            }else{
                $Vlrafp = 0;
            }

            if($afiliado->caja){
                $caja = 0.04;
                $Vlrcaja = $salario * $caja;
            }else{
                $Vlrcaja = 0;
            }
            
            $riesgo = $afiliado->riesgo;

            $Vlreps = $salario * $eps;
            $Vlriesgo = $salario * $riesgo;

            $subTotalCart = $Vlreps + $Vlrafp + $Vlrcaja + $Vlriesgo; 
            $totalCart = $subTotalCart + $adm;

            $coll = collect([
                'afiid' => $afiliado->id, 
                'documento' => $afiliado->documento,
                'name' => $afiliado->nombre,
                'caja' => $afiliado->cajas->nombre,
                'eps' => $afiliado->eps->nombre,
                'afp' => $afiliado->afp->nombre,
                'riesgo' => $afiliado->riesgo,
            ]);
            
            $itemsCart = Arr::add($coll, null, null);
            $this->cart->push($itemsCart);
            $this->adm = $adm;
            $this->subTotalCart = $subTotalCart;
            $this->totalCart = $totalCart;
            $this->save();
            $this->dispatch('refresh');
       
    }

    public function save(){
          session()->put("cart", $this->cart);
          session()->save();  
    }

    public function Rules(){
        return [
                'documento' => [
                    'required',
                    'numeric',
                ]
        ];
    }

    public function Create(){

            $this->validate($this->Rules());
            
            $ncodigo = Pago::latest()->first();

            if($ncodigo){
                $codigo = $ncodigo->codigo + 1;
            }else{
                $codigo = 1;
            } 
        
            $codigo1 = str_pad($codigo, 4, '0', STR_PAD_LEFT);
            
            $afiliado = Afiliado::where('documento', $this->documento)->get();
           
            $peridod = Pago::where('afiliado_id', $afiliado[0]->id) ->get();
        
            //validaciones
            if($peridod[0]->periodo ?? ""){
                 LivewireAlert::title('¡Periodo ya Pagado!')
                ->success()
                ->show();
                return;
            }

            if(empty($this->documento)){
                 LivewireAlert::title('¡Documento Obligatorio!')
                ->success()
                ->show();
                return;
            }

            $user = Auth::id();
            $mes = now()->month;
            $ano = now()->year;
            $perido = $mes.$ano;

            $pago = Pago::create([
                  'codigo' => $codigo1,
                  'afiliado_id' => $afiliado[0]->id,
                  'total_pagado' => $this->totalCart,
                  'fecha_pago' => now(),
                  'periodo' => $perido,
                  'user_id' => $user,
            ]); 

            LivewireAlert::title('¡Pago Realizado!')
            ->success()
            ->show();

            $this->Cancelar();
    }

    public function intCart($afiliado_id){
            $mycart = $this->cart;
            $cont = $mycart->where('afiid', $afiliado_id)->count();

            return $cont > 0 ? true : false;
    }

     public function mount(){
        if(session()->has('cart')){
            $this->cart = session('cart');
        } else {
            $this->cart = new Collection;
        }
    }

    public function render()
    {
        $this->cart = $this->cart->sortBy('nombre');
        return view('livewire.pagos.create-pagos');
    }
}
