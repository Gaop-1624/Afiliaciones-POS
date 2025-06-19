<?php

namespace App\Livewire\Afiliados;

use App\Models\Afiliado;
use App\Models\Afp;
use App\Models\Arl;
use App\Models\Ciudad;
use App\Models\Ep;
use App\Models\TDocumentos;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class EditAfiliado extends Component
{
    public $afiliadoid, $afiliado;
    public $TDocumentos, $Ciudades, $caja_id, $clienteid, $fecha_nac, $sexo, $caja;
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
               // 'string',
            ],
            'nombre' => [
                'required',
                'string',
                Rule::unique('afiliados')->ignore($this->afiliadoid)
            ],
           'documento' => [
                  'required',
                  'numeric',
                  Rule::unique('afiliados')->ignore($this->afiliadoid)
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
                  Rule::unique('afiliados')->ignore($this->afiliadoid)
            ],
            'ciudad_id' => [
                  'required',
            ], 
            'email' => [
                  'required',
                  'email',
                  Rule::unique('afiliados')->ignore($this->afiliadoid)
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
        ];
    }

     public function create(Afiliado $afiliado){
        $this->validate($this->Rules());
        $user = Auth::user()->id;

        if($this->caja_id == "true"){
            $caja = 1;
        }else{
            $caja = 3;
        }

        $afiliado = Afiliado::updateOrCreate(
            ['id' => $this->afiliadoid], 
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
            'caja' => $caja,
            'riesgo' => $this->riesgo
        ]);

        LivewireAlert::title('¡Afiliado Actualizado!')
        ->success()
        ->show();

        $this->redirectRoute('Afiliaciones.Afiliados');
     }

     public function mount($afiliadoid = null)
    { 
        $this->afiliadoid=$afiliadoid;
        $this->TDocumentos = TDocumentos::all();
        $this->Ciudades = Ciudad::all();
        $this->Eps = Ep::all();
        $this->Arl = Arl::all();
        $this->Afps = Afp::all();
    }

    public function render()
    {
        $afiliado = Afiliado::find($this->afiliadoid);
        return view('livewire.afiliados.edit-afiliado', [
            $this->tdocumento = $afiliado->tdocumento,
            $this->nombre = $afiliado->nombre,
            $this->documento = $afiliado->documento,
            $this->direccion = $afiliado->direccion,
            $this->telefono = $afiliado->telefono,
            $this->celular = $afiliado->celular,
            $this->email = $afiliado->email,
            $this->ciudad_id = $afiliado->ciudad_id,
            $this->userid = $afiliado->userid,
            $this->riesgo = $afiliado->riesgo,
            $this->eps_id = $afiliado->eps_id,
            $this->afp_id = $afiliado->afp_id,
            $this->fecha_nac = $afiliado->fecha_nac,
            $this->sexo = $afiliado->sexo,
            $this->caja = $afiliado->caja,
           
        ]);
    }
}
