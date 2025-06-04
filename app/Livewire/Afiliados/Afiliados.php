<?php

namespace App\Livewire\Afiliados;

use App\Models\Afiliado;
use Jantinnerezo\LivewireAlert\Facades\LivewireAlert;
use Livewire\Component;

class Afiliados extends Component
{
    public $search, $afiliado;

    function delete(Afiliado $afiliado)
    {
       /*  if ($user->sales->count() != 0) {
            $this->dispatch('toast', msg: 'No se puede eliminar porque tiene ventas asociadas');
            return;
        } */

        $afiliado->delete();
        LivewireAlert::title('¡Afiliado Eliminado!')
        ->success()
        ->show(); 

      //  $this->redirectRoute('Afiliaciones.Afiliados');

      
    }


    public function update(Afiliado $afiliado){
        return redirect()->route('Afiliaciones.Afiliados.Edit', ['afiliadoid' => $afiliado->id]);
    } 
    
    public function render()
    {
        $afiliados = Afiliado::where('id', 'like', '%'.$this->search. '%')
            ->orWhere('documento', 'like', '%'.$this->search. '%')
            ->orWhere('nombre', 'like', '%'.$this->search. '%') 
            ->orderBy('id','DESC')
            ->paginate(6);

        return view('livewire.afiliados.afiliados', [
            'afiliados' => $afiliados,
        ]);
    }
}
