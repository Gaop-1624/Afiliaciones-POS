<?php

namespace App\Livewire\Planillas;

use App\Models\AfiliadoPlanilla;
use App\Models\Pago;
use App\Models\Planilla;
use Illuminate\Support\Arr;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

use function Pest\Laravel\put;

class CreatePlanillas extends Component
{
    public Collection $cart;
    public $Pagos = [], $afiliado;
    public $totalCart=0;

    public function Cancelar(){
        $this->cart = new Collection;
        $this->save();
        $this->redirectRoute('Admin.Planillas');
    }

    public function refresh(){
        $this->cart = new Collection;
        $this->totalCart = 0;
        $this->save();
        $this->dispatch('refresh');
       // $this->redirectRoute('Admin.Planillas.Create');
    }

    function ScanningCode(){
        $Pagos = Pago::where('nplanilla', 1)->get();

       if ($Pagos) {
            $this->AddAfiliado($Pagos);
       } else {
            LivewireAlert::title('¡No Encontrado!')
            ->Error()
            ->show();
       }
    }

   /*  public function AddAfiliado($Pagos){
         
     // dd($Pagos);
         foreach($Pagos as $Pag){
    
                $salario = $Pag->afiliado->salario;
                $riesgo = $Pag->afiliado->riesgo;

                if($Pag->afiliado->afp_id == 10){
                    $Vlrafp = 0;
                }else{
                    $afp = 0.16;
                    $Vlrafp = $salario * $afp;
                }

                if($Pag->afiliado->caja = 1){
                    $caja = 0.04;
                    $Vlrcaja = $salario * $caja;
                
                }else{
                    $Vlrcaja = 0;
                }

                $VEps = ($salario * 0.04)/100;
                $VRiesgo = $salario * $riesgo;
                
                $totalCart = $VEps + $Vlrafp + $Vlrcaja + $VRiesgo;

                $coll = collect([
                    'tdocumento' => $Pagos[0]->afiliado->tdocumentos->nombre, 
                    'documento' => $Pag->afiliado->documento,
                    'name' => $Pag->afiliado->nombre,
                    'eps' => $Pag->afiliado->eps->nombre,
                    'caja' => $Pag->afiliado->cajas->nombre,
                    'afp' => $Pag->afiliado->afp->nombre,
                    'riesgo' => $Pag->afiliado->riesgo,   
                ]);
                    $itemsCart = Arr::add($coll, null, null);
                    $this->cart->push($itemsCart);  
                    $this->totalCart = $totalCart; 
                    $this->save();
                    $this->dispatch('refresh');
                    
               
        } 
} */
 
    public function save(){
          session()->put("cart", $this->cart);
          session()->save();  
    } 

    public function Create(){
        $planillas = Pago::where('nplanilla', 1)->get();

       // dd($planillas);
       $totalCart = Pago::sum('total_pagado');
      // dd($totalCart);
        $user = Auth::id();
        $mes = now()->month;
        $ano = now()->year;
        $periodo = $ano."-".$mes;
        $periodop = $ano."-".$mes-1;
       
        DB::beginTransaction();

            try {

                $planilla = Planilla::Create([
                    'nplanilla' => 'Pendiente',
                    'total_pagado' => 0,
                    'periodo_salud' => $periodo,
                    'periodo_pension' => $periodop,
                    'user_id' => $user,
                ]);

                $cont=0;
                while($cont < count($planillas)){
                    AfiliadoPlanilla::create([
                        'planilla_id' => $planilla->id,
                        'afiliado_id' => $planillas[$cont]->afiliado_id,
                        'eps_id' => $planillas[$cont]->afiliado->eps_id,
                        'afp_id' => $planillas[$cont]->afiliado->afp_id,
                        'caja_id' => $planillas[$cont]->afiliado->caja_id, 
                    ]);

                    DB::table('pagos')->where('nplanilla', '1')->update([
                        'nplanilla' => '2'
                    ]);

                   $cont++;
                }

                 LivewireAlert::title('¡Planilla Creada!')
                 ->success()
                 ->show();

                 $this->redirectRoute('Admin.Planillas');

            } catch (\Throwable $th) {
                DB::rollBack();
                LivewireAlert::title('¡Error al Guardar la Planilla!')
                    ->Error()
                    ->timer(3000)
                    ->show();
            }

        DB::commit();

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
        $planillas = Pago::where('nplanilla', 1)->get();
        return view('livewire.planillas.create-planillas', [
            'planillas' => $planillas
        ]);
    }

   

   /*  public function Create(){
      
      $planillas = Pago::where('nplanilla', 1)->get();
   
        $user = Auth::id();
        $mes = now()->month;
        $ano = now()->year;
        $periodo = $ano."-".$mes;
        $periodop = $ano."-".$mes-1;

        DB::beginTransaction();
            try {
                $planilla = Planilla::Create([
                    'nplanilla' => 'Pendiente',
                    'total_pagado' => 0,
                    'periodo_salud' => $periodo,
                    'periodo_pension' => $periodop,
                    'user_id' => $user,
                ]);
              

            } catch (\Throwable $th) {
                DB::rollBack();
                LivewireAlert::title('¡Error al Guardar la Planilla!')
                    ->Error()
                    ->timer(3000)
                    ->show();
            }
        DB::commit();
    } */
}
