<?php

namespace App\Livewire\Empresas;

use App\Models\Arl;
use App\Models\Caja;
use App\Models\Ciudad;
use App\Models\Empresa;
use App\Models\TDocumentos;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class Empresas extends Component
{
    public $empresas, $TDocumentos, $Ciudades, $nombre, $nit, $direccion, $telefono, $celular, $email, $ciudad_id;
    public $t_documento_id, $empresa_id, $user, $dev, $Pagina_web, $empresa, $userid, $empresaid, $arl_id, $caja_id, $Arls, $Cajas;

    public function closeModal(){
        $this->resetValidation();
        $this->redirectRoute('dashboard');
    }

    public function update(){

        $user = User::find(Auth::user()->id);
        $idEmpresa = $user->empresa_id;
        $empresa = Empresa::find($idEmpresa);
      
        $empresa->update([
            'nombre' => $this->nombre,
          //  'nit' => $this->nit,
            'direccion' => $this->direccion,
            'telefono' => $this->telefono,
            'celular' => $this->celular,
            'email' => $this->email,
            'ciudad_id' => $this->ciudad_id,
           // 't_documento_id' => $this->t_documento_id,
            'caja_id' => $this->caja_id,
            'arl_id' => $this->arl_id,
        ]);

        LivewireAlert::title('¡Empresa Actualizada!')
        ->success()
        ->show();

       $this->redirectRoute('Empresas.Configurar');
        
    }

    public function mount($empresaid = null)
    {
        $this->TDocumentos = TDocumentos::all();
        $this->Ciudades = Ciudad::all();
        $this->Cajas = Caja::all();
        $this->Arls = Arl::all();
    }

    public function render()
    {
        $user = User::find(Auth::user()->id);
        $idEmpresa = $user->empresa_id;
        $Empresa = Empresa::find($idEmpresa);
        
        return view('livewire.empresas.empresas', [
            $this->nit = $Empresa->nit,
            $this->nombre = $Empresa->nombre,
            $this->direccion = $Empresa->direccion,
            $this->telefono = $Empresa->telefono,
            $this->celular = $Empresa->celular,
            $this->email = $Empresa->email,
            $this->direccion = $Empresa->direccion,
            $this->ciudad_id = $Empresa->ciudad_id,
            $this->t_documento_id = $Empresa->t_documento_id,
            $this->dev = $Empresa->dev,
            $this->arl_id = $Empresa->arl_id,
            $this->caja_id = $Empresa->caja_id,
            $this->Pagina_web = $Empresa->Pagina_web,
        ]);
    }
}
