<?php

namespace App\Livewire\Afiliados;

use App\Models\Afiliado;
use App\Models\Afp;
use App\Models\Arl;
use App\Models\Ciudad;
use App\Models\Ep;
use App\Models\Salario;
use App\Models\TDocumentos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class CreateAfiliado extends Component
{
    public $TDocumentos, $Ciudades, $caja, $clienteid, $fecha_nac, $sexo, $caja_id, $salario;
    public $nombre, $documento, $tdocumento, $direccion, $telefono, $celular, $email, $ciudad_id, $id;
    public $empresa_id, $user, $arl_id, $Arl, $empresa, $userid, $riesgo, $eps_id, $Eps, $afp_id, $Afps;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('Afiliaciones.Afiliados');
    }

    public function Rules(){
        return [
            'tdocumento' => [
                'required',
                'string',
            ],
            'nombre' => [
                'required',
                'string',
                Rule::unique('afiliados')->ignore($this->id)
            ],
           'documento' => [
                  'required',
                  'numeric',
                  Rule::unique('afiliados')->ignore($this->id)
           ],  
            'direccion' => [
                  'required',
                  'string',
            ],  
            'telefono' => [
                  'nullable',
                  'numeric',
            ],
            'celular' => [
                  'required',
                  'numeric',
                  Rule::unique('afiliados')->ignore($this->clienteid)
            ],
            'ciudad_id' => [
                  'required',
            ], 
            'email' => [
                  'required',
                  'email',
                  Rule::unique('afiliados')->ignore($this->clienteid)
            ],
            'eps_id' => [
                  'required',
            ],
           
            'afp_id' => [
                  'required',
            ],
            
            'riesgo' => [
                  'required',
            ], 
            'salario' => [
                  'required',
                  'numeric'
            ], 
        ];
    }

     public function create(){
        $this->validate($this->Rules());
        $user = Auth::user()->id;

        if($this->caja_id == "true"){
            $caja = 1;
        }else{
            $caja = 3;
        }
        
        DB::beginTransaction();
            try { 
              $afiliado =  Afiliado::updateOrCreate(
                    ['id' => $this->clienteid], 
                    [
                        'tdocumento' => $this->tdocumento,
                        'documento' => $this->documento,
                        'nombre' => $this->nombre,
                        'fecha_nac' => $this->fecha_nac,
                        'direccion' => $this->direccion, 
                        'telefono' => $this->telefono,
                        'celular' => $this->celular,
                        'ciudad_id' => $this->ciudad_id,
                        'email' => $this->email,
                        'user_id' => $user,
                        'eps_id' => $this->eps_id,
                        'afp_id' => $this->afp_id,
                        'sexo' => $this->sexo,
                        'caja_id' => $caja,
                        'riesgo' => $this->riesgo,
                      
                    ]);

                    Salario::create([
                        'salario' => $this->salario,
                        'año' => now()->year,
                        'afiliado_id' => $afiliado->id
                    ]); 

                           
                    LivewireAlert::title('¡Afiliado Creado!')
                    ->success()
                    ->show();
                    $this->redirectRoute('Afiliaciones.Afiliados');

          } catch (\Throwable $th) {
                    DB::rollBack();
                    LivewireAlert::title('¡Error al Crear al Afiliado!')
                        ->Error()
                        ->timer(3000)
                        ->show();
            }
           
        DB::commit();
        
     }

    public function mount()
    {
        $this->TDocumentos = TDocumentos::all();
        $this->Ciudades = Ciudad::all();
        $this->Eps = Ep::all();
        $this->Arl = Arl::all();
        $this->Afps = Afp::all();
    }

    public function render()
    {
        return view('livewire.afiliados.create-afiliado');
    }
}
